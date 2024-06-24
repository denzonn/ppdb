<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .center-container {
            text-align: center;
            height: 100vh;
        }

        .h-5 {
            height: 5em;
        }
        .h-7 {
            height: 7em;
        }

        .text-lg {
            font-size: 26px;
            line-height: 2rem;
        }

        .font-semibold {
            font-weight: 800;
        }

        .border {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
        }

        .table-container {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container th,
        .table-container td {
            border-bottom: 1px solid black;
            padding: 10px;
            font-size: 16px;
        }

        .nested-table {
            width: 100%;
            border-collapse: collapse;
            border-bottom: none;
        }

        .nested-table td {
            border: none;
            padding: 0px;
            font-size: 14px;
        }

        .item-1 {
            width: 7%;
            border-right: 1px solid black;
        }

        .item-2 {
            width: 38%;
            border-right: 1px solid black;
        }

        .item-3 {
            width: 55%;
        }

        .item-4 {
            width: 60%;
            border-right: 1px solid black;
        }

        .item-5 {
            width: 33%;
        }
    </style>
</head>

<body>
    <div class="center-container">
        <div>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/logo.png'))) }}"
                alt="Logo" class="h-5">
        </div>
        <div class="text-lg font-semibold" style="margin-top: 10px; font-weight: bold">
            PEMERINTAH KABUPATEN TORAJA UTARA <br>
            DINAS PENDIDIKAN <br>
            SDN 2 RANTEPAO
        </div>
        <div style="font-style: italic; margin-top: 10px">
            Jln. DR. Sam Ratulangi’ No. 33 Rantepao, Telp. 0423-23548
        </div>
        <hr style="height: 3px; background: black; color: black">
    </div>
    <div style="border: 1px solid black; border-bottom: 0px solid transparent; padding: 10px 0px 0px 0px">
        <div style="font-size: 18px; font-weight: bold; text-align: center">FORMULIR PENDAFTARAN SISWA BARU <br>
            TAHUN PELAJARAN 2024/2025</div>
        <div style="margin-top: 20px; font-weight: bold; font-size: 18px; padding: 0 10px">
            NO PENDAFTARAN : {{ $data->no_register }}
        </div>
        <div class="border"
            style="padding: 6px; font-size: 18px; font-weight: bold; font-style: italic; border-bottom: 0px solid transparent;">
            A. IDENTITAS CALON SISWA
        </div>
    </div>
    <div style="border: 1px solid black; border-bottom: 0px solid transparent;">
        <table class="table-container">
            <tr>
                <td class="item-1">1.</td>
                <td class="item-2">Nama Lengkap Calon Siswa </td>
                <td class="item-3">{{ $data->studentData->fullname }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">2.</td>
                <td class="item-2">Nama Panggilan </td>
                <td class="item-3">{{ $data->studentData->name }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">3.</td>
                <td class="item-2">Jenis Kelamin </td>
                <td class="item-3">{{ $data->studentData->gender }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">4.</td>
                <td class="item-2">NIK </td>
                <td class="item-3">{{ $data->studentData->nik }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">5.</td>
                <td class="item-2">Tempat, Tanggal Lahir </td>
                <td class="item-3">{{ $data->studentData->birth_place }}, {{ $data->studentData->birth_date }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">6.</td>
                <td class="item-2">Asal Sekolah (TK) </td>
                <td class="item-3">{{ $data->studentData->old_school }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">7.</td>
                <td class="item-2">Agama / Kepercayaan </td>
                <td class="item-3">{{ $data->studentData->religion }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">8.</td>
                <td class="item-2">Alamat Tinggal </td>
                <td style="width: 55%; padding: 0px">
                    <table class="nested-table">
                        <tr>
                            <td style="border-right: 1px solid black; border-bottom: 1px solid black; padding: 7px">RT :
                                {{ $data->studentData->address_rt }}</td>
                            <td style="border-right: 1px solid black; border-bottom: 1px solid black; padding: 7px">RW :
                                {{ $data->studentData->address_rw }}</td>
                            <td style="border-bottom: 1px solid black; padding: 7px">Dusun :
                                {{ $data->studentData->address_hamlet }}</td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid black; border-right: 1px solid black; padding: 7px">Desa
                                : {{ $data->studentData->address_village }}</td>
                            <td style="border-bottom: 1px solid black; padding: 7px" colspan="2">Kecamatan :
                                {{ $data->studentData->address_subdistrict }}</td>
                        </tr>
                        <tr>
                            <td style=" padding: 7px" colspan="3">Kab/Kota :
                                {{ $data->studentData->address_regency }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">9.</td>
                <td class="item-2">Tinggal Bersama </td>
                <td class="item-3">{{ $data->studentData->living_together }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">10.</td>
                <td class="item-2">No Tlvn/WA </td>
                <td class="item-3">{{ $data->studentData->no_telp }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">11.</td>
                <td class="item-2">Anak ke- </td>
                <td class="item-3">{{ $data->studentData->child_order }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">12.</td>
                <td class="item-2">Jumlah Saudara </td>
                <td class="item-3">{{ $data->studentData->siblings }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">13.</td>
                <td class="item-2">Hobby </td>
                <td class="item-3">{{ $data->studentData->hobby }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">14.</td>
                <td class="item-2">Cita-Cita </td>
                <td class="item-3">{{ $data->studentData->goal }}</td>
            </tr>
        </table>
    </div>
    <div
        style="border: 1px solid black; border-bottom: 0px solid transparent; padding: 10px 0px 10px 6px; font-size: 18px; font-weight: bold; font-style: italic;">
        B. IDENTITAS ORANG TUA
    </div>
    <div style="border: 1px solid black; border-bottom: 0px solid transparent;">
        <table class="table-container">
            <tr>
                <td class="item-1">1.</td>
                <td class="item-2">Nama Ayah </td>
                <td class="item-3">{{ $data->parentData->father_name ?? '-' }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">2.</td>
                <td class="item-2">NIK </td>
                <td class="item-3">{{ $data->parentData->father_nik ?? '-' }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">3.</td>
                <td class="item-2">Tempat, Tanggal Lahir </td>
                <td class="item-3">{{ $data->parentData->father_birth_place ?? '-' }},
                    {{ $data->parentData->father_birth_date ?? '' }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">4.</td>
                <td class="item-2">Pendidikan Terakhir </td>
                <td class="item-3">{{ $data->parentData->father_education ?? '-' }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">5.</td>
                <td class="item-2">Pekerjaan </td>
                <td class="item-3">{{ $data->parentData->father_job ?? '-' }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">6.</td>
                <td class="item-2">Penghasilan </td>
                <td class="item-3">{{ $data->parentData->father_income ?? '-' }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">7.</td>
                <td class="item-2">Alamat Tinggal </td>
                <td style="width: 55%; padding: 0px">
                    <table class="nested-table">
                        <tr>
                            <td style="border-right: 1px solid black; border-bottom: 1px solid black; padding: 7px">RT
                                : {{ $data->parentData->father_address_rt ?? '-' }}</td>
                            <td style="border-right: 1px solid black; border-bottom: 1px solid black; padding: 7px">RW
                                : {{ $data->parentData->father_address_rw ?? '-' }}</td>
                            <td style="border-bottom: 1px solid black; padding: 7px">Dusun :
                                {{ $data->parentData->father_address_hamlet ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid black; border-right: 1px solid black; padding: 7px">
                                Desa : {{ $data->parentData->father_address_village ?? '-' }}</td>
                            <td style="border-bottom: 1px solid black; padding: 7px" colspan="2">Kecamatan :
                                {{ $data->parentData->father_address_subdistrict ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td style=" padding: 7px" colspan="3">Kab/Kota :
                                {{ $data->parentData->father_address_regency ?? '-' }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">8.</td>
                <td class="item-2">Nama Ibu </td>
                <td class="item-3">{{ $data->parentData->mother_name ?? '-' }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">9.</td>
                <td class="item-2">NIK </td>
                <td class="item-3">{{ $data->parentData->mother_nik ?? '-' }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">10.</td>
                <td class="item-2">Tempat, Tanggal Lahir </td>
                <td class="item-3">{{ $data->parentData->mother_birth_place ?? '-' }},
                    {{ $data->parentData->mother_birth_date ?? '' }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">11.</td>
                <td class="item-2">Pendidikan Terakhir </td>
                <td class="item-3">{{ $data->parentData->mother_education ?? '-' }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">12.</td>
                <td class="item-2">Pekerjaan </td>
                <td class="item-3">{{ $data->parentData->mother_job ?? '-' }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">13.</td>
                <td class="item-2">Penghasilan </td>
                <td class="item-3">{{ $data->parentData->mother_income ?? '-' }}</td>
            </tr>
        </table>
        <table class="table-container">
            <tr>
                <td class="item-1">14.</td>
                <td class="item-2">Alamat Tinggal </td>
                <td style="width: 55%; padding: 0px">
                    <table class="nested-table">
                        <tr>
                            <td style="border-right: 1px solid black; border-bottom: 1px solid black; padding: 7px">RT
                                : {{ $data->parentData->mother_address_rt ?? '-' }}</td>
                            <td style="border-right: 1px solid black; border-bottom: 1px solid black; padding: 7px">RW
                                : {{ $data->parentData->mother_address_rw ?? '-' }}</td>
                            <td style="border-bottom: 1px solid black; padding: 7px">Dusun :
                                {{ $data->parentData->mother_address_hamlet ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid black; border-right: 1px solid black; padding: 7px">
                                Desa : {{ $data->parentData->mother_address_village ?? '-' }}</td>
                            <td style="border-bottom: 1px solid black; padding: 7px" colspan="2">Kecamatan :
                                {{ $data->parentData->mother_address_subdistrict ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td style=" padding: 7px" colspan="3">Kab/Kota :
                                {{ $data->parentData->mother_address_regency ?? '-' }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div
        style="border: 1px solid black; border-bottom: 0px solid transparent; padding: 10px 0px 10px 6px; font-size: 18px; font-weight: bold; font-style: italic;">
        C. IDENTITAS WALI
    </div>
    <div>
        <table class="table-container">
            <tr style="border: 1px solid black;">
                <td class="item-1">1.</td>
                <td class="item-2">Nama Wali </td>
                <td class="item-3">{{ $data->guardianData->name ?? '-' }}</td>
            </tr>
            <tr style="border: 1px solid black;">
                <td class="item-1">2.</td>
                <td class="item-2">Tempat, Tanggal Lahir </td>
                <td class="item-3">{{ $data->guardianData->birth_place ?? '-' }}
                    {{ $data->guardianData->birth_date ?? '' }}</td>
            </tr>
            <tr style="border: 1px solid black;">
                <td class="item-1">3.</td>
                <td class="item-2">Pendidikan Terakhir </td>
                <td class="item-3">{{ $data->guardianData->education ?? '-' }}</td>
            </tr>
            <tr style="border: 1px solid black;">
                <td class="item-1">4.</td>
                <td class="item-2">Pekerjaan </td>
                <td class="item-3">{{ $data->guardianData->job ?? '-' }}</td>
            </tr>
            <tr style="border: 1px solid black;">
                <td class="item-1">5.</td>
                <td class="item-2">Alamat Tinggal </td>
                <td class="item-3" style="padding: 0px">
                    <table class="nested-table">
                        <tr>
                            <td style="border-right: 1px solid black; border-bottom: 1px solid black; padding: 7px">RT
                                : {{ $data->guardianData->address_rt ?? '-' }}</td>
                            <td style="border-right: 1px solid black; border-bottom: 1px solid black; padding: 7px">RW
                                : {{ $data->guardianData->address_rw ?? '-' }}</td>
                            <td style="border-bottom: 1px solid black; padding: 7px">Dusun :
                                {{ $data->guardianData->address_hamlet ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid black; border-right: 1px solid black; padding: 7px">
                                Desa : {{ $data->guardianData->address_village ?? '-' }}</td>
                            <td style="border-bottom: 1px solid black; padding: 7px" colspan="2">Kecamatan :
                                {{ $data->guardianData->address_subdistrict ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td style=" padding: 7px" colspan="3">Kab/Kota :
                                {{ $data->guardianData->address_regency ?? '-' }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div
        style="border: 1px solid black; border-bottom: 0px solid transparent; padding: 10px 0px 10px 6px; font-size: 18px; font-weight: bold; font-style: italic;">
        D. PERSYARATAN PENDAFTARAN
    </div>
    <div>
        <table class="table-container">
            <tr style="border: 1px solid black;">
                <td class="item-1">1.</td>
                <td class="item-4">Fc. Akta Kelahiran 2 Lembar </td>
                <td class="item-5">Ada</td>
            </tr>
            <tr style="border: 1px solid black;">
                <td class="item-1">2.</td>
                <td class="item-4">Fc. Kartu Keluarga 2 Lembar </td>
                <td class="item-5">Ada</td>
            </tr>
            <tr style="border: 1px solid black;">
                <td class="item-1">3.</td>
                <td class="item-4">Bukti Pendaftaran (Map snelhecter berwarna Merah) </td>
                <td class="item-5">Ada</td>
            </tr>
        </table>
    </div>
    <div style="border: 1px solid black; border-top: 0px solide transparent;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 67%; text-align: center; border-right: 1px solid black; vertical-align: top;">
                    <div>Mengetahui,</div>
                    <div>Ketua Panitia PPDB</div>
                    <div style="padding: 20px 0 5px 0;">
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/qrcode.png'))) }}"
                            alt="Logo" class="h-7">
                    </div>
                    <div style="font-weight: bold; font-size: 18px; text-decoration: underline;">
                        GELORA E. TOTTING, S.Th., M.Pd
                    </div>
                    <div style="font-size: 16px;">
                        NIP 19680912 200502 2 007
                    </div>
                </td>
                <td style="width: 33%; text-align: center; vertical-align: top;">
                    <div style="white-space: pre; text-align: center;">
                        Rantepao,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;,2024
                    </div>
                    <div>Orang Tua</div>
                    <br><br><br><br>
                    <div>(Nama Jelas)</div>
                </td>
            </tr>
        </table>
    </div>

    <div style="margin-top: 20px; font-size: 20px; font-weight: bold">
        Syarat dan Ketentuan: Minimal berusia 6 Tahun per 1 Juli 2024
    </div>
</body>

</html>
