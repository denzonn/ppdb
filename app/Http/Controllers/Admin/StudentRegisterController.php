<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentRegister;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Google\Client as GoogleClient;
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
}
