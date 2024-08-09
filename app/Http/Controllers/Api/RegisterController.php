<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Committe;
use App\Models\Guardian;
use App\Models\ParentData;
use App\Models\RegisterInformation;
use App\Models\StudentData;
use App\Models\StudentRegister;
use App\Models\StudentTermData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Response;
use Mpdf\Mpdf;

class RegisterController extends BaseController
{
    public function index()
    {
        $data = StudentRegister::where('user_id', Auth::user()->id)->with(['studentData', 'parentData', 'guardianData', 'termData', 'user'])->first();

        return $this->sendResponse($data, 'Successfully get data');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $lastRegister = StudentRegister::orderBy('no_register', 'desc')->first();
        $alreadyRegister = StudentRegister::where('user_id', Auth::user()->id)->first();

        if ($lastRegister) {
            $lastNumber = (int)$lastRegister->no_register;
            $no_register = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $no_register = '0001';
        }

        if (!$alreadyRegister) {
            $studentRegister = StudentRegister::create([
                'user_id' => Auth::user()->id,
                'no_register' => $no_register,
            ]);

            //Student
            StudentData::create([
                'student_register_id' => $studentRegister->id,
                ...$data
            ]);

            //Parent
            if (!$request['guardian_name']) {
                ParentData::create([
                    'student_register_id' => $studentRegister->id,
                    ...$data
                ]);
            } else {
                Guardian::create([
                    'student_register_id' => $studentRegister->id,
                    'name' => $data['guardian_name'],
                    'birth_place' => $data['guardian_birth_place'],
                    'birth_date' => $data['guardian_birth_date'],
                    'education' => $data['guardian_education'],
                    'job' => $data['guardian_job'],
                    'address_rt' => $data['guardian_address_rt'],
                    'address_rw' => $data['guardian_address_rw'],
                    'address_hamlet' => $data['guardian_address_hamlet'],
                    'address_village' => $data['guardian_address_village'],
                    'address_subdistrict' => $data['guardian_address_subdistrict'],
                    'address_regency' => $data['guardian_address_regency'],
                ]);
            }

            if ($request->hasFile('photo_akta')) {
                $images = $request->file('photo_akta');
                $extension = $images->getClientOriginalExtension();
                $file_name = uniqid() . "." . $extension;
                $data['photo_akta'] = $images->storeAs('photo_akta', $file_name, 'public');
            }

            if ($request->hasFile('photo_kk')) {
                $images = $request->file('photo_kk');
                $extension = $images->getClientOriginalExtension();
                $file_name = uniqid() . "." . $extension;
                $data['photo_kk'] = $images->storeAs('photo_kk', $file_name, 'public');
            }

            StudentTermData::create([
                'student_register_id' => $studentRegister->id,
                'photo_akta' => $data['photo_akta'],
                'photo_kk' => $data['photo_kk'],
            ]);
        } else {
            return $this->sendError('User already registered');
        }

        return $this->sendResponse($studentRegister, 'Successfully create a new registration');
    }

    public function information()
    {
        $data = RegisterInformation::first();

        return $this->sendResponse($data, 'Successfully get registration information');
    }

    public function pdf($no_register)
    {
        $data = StudentRegister::with(['studentData', 'parentData', 'guardianData', 'termData', 'user'])
            ->where('no_register', $no_register)
            ->first();

            $committe = Committe::first();

        $html = view('pages.student-register.pdf', compact('data', 'committe'))->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        // Capture the output as a string
        $pdfContent = $mpdf->Output('', 'S');

        // Return the PDF file as a response
        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="Data Registrasi.pdf"',
        ]);
    }
}
