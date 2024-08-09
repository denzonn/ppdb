<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committe;
use App\Models\Guardian;
use App\Models\ParentData;
use App\Models\StudentData;
use App\Models\StudentRegister;
use App\Models\StudentTermData;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Google\Client as GoogleClient;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class StudentRegisterController extends Controller
{

    public function index()
    {
        return view('pages.student-register.index');
    }

    public function getData()
    {
        $student = StudentRegister::with(['user'])->get();

        return DataTables::of($student)->make(true);
    }

    public function detail($no_register)
    {
        $data = StudentRegister::with(['studentData', 'parentData', 'guardianData', 'termData', 'user'])->where('no_register', $no_register)->first();

        return view('pages.student-register.detail', compact('data'));
    }

    public function edit($no_register)
    {
        $data = StudentRegister::with(['studentData', 'parentData', 'guardianData', 'termData', 'user'])->where('no_register', $no_register)->first();
        return view('pages.student-register.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $student = StudentRegister::findOrFail($id);

        $studentData = StudentData::where('student_register_id', $student->id)->first();
        $studentData->update($data);

        if ($request['guardian_name']) {
            $guardianData = Guardian::where('student_register_id', $student->id)->first();

            $guardianData->update([
                'student_register_id' => $student->id,
                'name' => $request['guardian_name'],
                'birth_place' => $request['guardian_birth_place'],
                'birth_date' => $request['guardian_birth_date'],
                'education' => $request['guardian_education'],
                'job' => $request['guardian_job'],
                'address_rt' => $request['guardian_address_rt'],
                'address_rw' => $request['guardian_address_rw'],
                'address_hamlet' => $request['guardian_address_hamlet'],
                'address_village' => $request['guardian_address_village'],
                'address_subdistrict' => $request['guardian_address_subdistrict'],
                'address_regency' => $request['guardian_address_regencye'],
            ]);
        } else {
            $parentData = ParentData::where('student_register_id', $student->id)->first();

            $parentData->update([
                'student_register_id' => $student->id,
                'father_name' => $request['parent_father_name'],
                'father_nik' => $request['parent_father_nik'],
                'father_birth_place' => $request['parent_father_birth_place'],
                'father_birth_date' => $request['parent_father_birth_date'],
                'father_education' => $request['parent_father_education'],
                'father_job' => $request['parent_father_job'],
                'father_income' => $request['parent_father_income'],
                'father_address_rt' => $request['parent_father_address_rt'],
                'father_address_rw' => $request['parent_father_address_rw'],
                'father_address_hamlet' => $request['parent_father_address_hamlet'],
                'father_address_village' => $request['parent_father_address_village'],
                'father_address_subdistrict' => $request['parent_father_address_subdistrict'],
                'father_address_regency' => $request['parent_father_address_regency'],
                'mother_name' => $request['parent_mother_name'],
                'mother_nik' => $request['parent_mother_nik'],
                'mother_birth_place' => $request['parent_mother_birth_place'],
                'mother_birth_date' => $request['parent_mother_birth_date'],
                'mother_education' => $request['parent_mother_education'],
                'mother_job' => $request['parent_mother_job'],
                'mother_income' => $request['parent_mother_income'],
                'mother_address_rt' => $request['parent_mother_address_rt'],
                'mother_address_rw' => $request['parent_mother_address_rt'],
                'mother_address_hamlet' => $request['parent_mother_address_hamlet'],
                'mother_address_village' => $request['parent_mother_address_village'],
                'mother_address_subdistrict' => $request['parent_mother_address_subdistrict'],
                'mother_address_regency' => $request['parent_mother_address_regency'],
            ]);
        }

        if ($request['photo_akta']) {
            $termData = StudentTermData::where('student_register_id', $student->id)->first();

            Storage::disk('public')->delete($termData->photo_akta);

            $images = $request->file('photo_akta');
            $extension = $images->getClientOriginalExtension();
            $file_name = uniqid() . "." . $extension;
            $data['photo_akta'] = $images->storeAs('photo_akta', $file_name, 'public');

            $termData->update([
                'student_register_id' => $student->id,
                'photo_akta' => $data['photo_akta'],
            ]);
        }

        if ($request['photo_kk']) {
            $termData = StudentTermData::where('student_register_id', $student->id)->first();

            Storage::disk('public')->delete($termData->photo_kk);

            $images = $request->file('photo_kk');
            $extension = $images->getClientOriginalExtension();
            $file_name = uniqid() . "." . $extension;
            $data['photo_kk'] = $images->storeAs('photo_kk', $file_name, 'public');

            $termData->update([
                'student_register_id' => $student->id,
                'photo_kk' => $data['photo_kk'],
            ]);
        }

        return redirect()->route('student-register-index');
    }

    public function destroy($no_register)
    {
        $data = StudentRegister::where('no_register', $no_register)->first();
        $data->delete();

        return redirect()->route('student-register-index');
    }

    public function view_pdf($no_register)
    {
        $data = StudentRegister::with(['studentData', 'parentData', 'guardianData', 'termData', 'user'])->where('no_register', $no_register)->first();
        $committe = Committe::first();

        $html = view('pages.student-register.pdf', compact('data', 'committe'))->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Data Registrasi.pdf', \Mpdf\Output\Destination::DOWNLOAD);
    }

    private function getAccessToken()
    {
        $client = new GoogleClient();
        $client->setAuthConfig(storage_path('app/ppdb-c2234-8fc8f37c615d.json'));
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        $token = $client->fetchAccessTokenWithAssertion();
        return $token['access_token'];
    }

    public function sendNotification(Request $request, $no_register)
    {
        $studentRegister = StudentRegister::where('no_register', $no_register)->first();
        $user = User::find($studentRegister->user_id);

        if (!$user || !$user->token) {
            return response()->json(['error' => 'User not found or token is missing'], 404);
        }

        $accessToken = $this->getAccessToken();

        $client = new Client();

        $url = 'https://fcm.googleapis.com/v1/projects/ppdb-c2234/messages:send';

        $data = [
            'message' => [
                'token' => $user->token,
                'notification' => [
                    'title' => `Selamat $user->name`,
                    'body' => 'Anda dinyatakan Lulus. Informasi lebih lanjut silahkan datang ke SDN 2 Rantepao!'
                ]
            ]
        ];

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json',
                ],
                'json' => $data
            ]);

            $responseBody = json_decode($response->getBody()->getContents(), true);

            $studentRegister->is_confirm = 1;
            $studentRegister->save();

            return redirect()->route('student-register')->with('toast_success', 'Konfirmasi Successfully!');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function sendNotificationFailed(Request $request, $no_register)
    {
        $studentRegister = StudentRegister::where('no_register', $no_register)->first();
        $user = User::find($studentRegister->user_id);

        if (!$user || !$user->token) {
            return response()->json(['error' => 'User not found or token is missing'], 404);
        }

        $accessToken = $this->getAccessToken();

        $client = new Client();

        $url = 'https://fcm.googleapis.com/v1/projects/ppdb-c2234/messages:send';

        $data = [
            'message' => [
                'token' => $user->token,
                'notification' => [
                    'title' => "Mohon Maaf, {$user->name}",
                    'body' => 'Anda dinyatakan gagal. Informasi lebih lanjut silahkan datang ke SDN 2 Rantepao!'
                ]
            ]
        ];

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json',
                ],
                'json' => $data
            ]);

            $responseBody = json_decode($response->getBody()->getContents(), true);

            $studentRegister->is_confirm = 2;
            $studentRegister->save();

            return redirect()->route('student-register')->with('toast_success', 'Konfirmasi Successfully!');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function committe($id)
    {
        $data = Committe::findOrFail($id);

        return view('pages.student-register.committe', compact('data'));
    }

    public function committeUpdate(Request $request, $id)
    {
        $committe = Committe::findOrFail($id);

        $data = $request->except('qrcode');

        if ($request->hasFile('qrcode')) {
            if ($committe->qrcode) {
                Storage::disk('public')->delete('qrcode/' . $committe->qrcode);
            }

            $image = $request->file('qrcode');
            $imageData = file_get_contents($image);
            $base64Image = 'data:image/' . $image->getClientOriginalExtension() . ';base64,' . base64_encode($imageData);

            $data['qrcode'] = $base64Image;
        }

        $committe->update($data);

        // Log the Base64 image data to check if it's correct
        Log::info($data['qrcode']);

        return redirect()->refresh();
    }
}
