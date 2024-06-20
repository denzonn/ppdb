<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentRegister;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
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

    public function view_pdf($no_register)
    {
        $data = StudentRegister::with(['studentData', 'parentData', 'guardianData', 'termData', 'user'])->where('no_register', $no_register)->first();

        $html = view('pages.student-register.pdf', compact('data'))->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Data Registrasi.pdf', \Mpdf\Output\Destination::DOWNLOAD);
    }

    public function sendGraduationMessage($no_register){
        $data = StudentRegister::where('no_register',$no_register)->first();

        $data->is_confirm = 1;

        $phone = "0895326173804";
        $message = "Selamat Anda Lulus";

        $whatsappUrl = "https://api.whatsapp.com/send?phone=$phone&text=" . urlencode($message);

        return redirect()->away($whatsappUrl);
    }
}
