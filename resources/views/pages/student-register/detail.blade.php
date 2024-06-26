@extends('layouts.app')

@section('title')
    Informasi
@endsection

@section('content')
    <div class="mb-4">
        <div class="flex flex-row gap-4 text-[#707EAE]">
            <a href="/admin/dashboard">Page</a>
            <div>/</div>
            <a href="/admin/student-register">Peserta Pendaftaran</a>
            <div>/</div>
            <div>Detail</div>
        </div>
        <div class=" font-semibold text-primary text-4xl">Detail Peserta Pendaftaran</div>
    </div>
    <div class="bg-white p-8 rounded-md text-gray-500 max-h-[86vh] overflow-auto scrolling">
        <div class="grid grid-cols-2 gap-2 justify-between items-center">
            <div class="flex flex-row gap-2 items-center mb-6">
                <div>
                    <a href="{{ route('student-register-index') }}"
                        class="bg-primary px-2 py-2 text-white rounded-md flex items-center justify-center">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
                <div class="text-xl font-semibold">Detail Registrasi</div>
            </div>
            <div class="flex flex-row items-center gap-4 justify-end w-full">
                @if ($data->is_confirm == 1)
                    <div class="text-green-500 font-semibold">Diterima</div>
                @elseif ($data->is_confirm == 2)
                    <div class="text-red-500 font-semibold">Ditolak</div>
                @endif
                <a href="{{ route('student-register-pdf', $data->no_register) }}"
                    class="py-2 px-8 bg-red-500 rounded-md text-white mr-6"><i class="fa-solid fa-file-pdf text-lg"></i></a>
                @if ($data->is_confirm == 0)
                    <a href="{{ route('sendNotification', $data->no_register) }}"
                        onclick="event.preventDefault(); document.getElementById('sendNotification').submit();"
                        class="py-2 px-8 bg-primary rounded-md text-white"><i
                            class="fa-solid fa-circle-check text-lg"></i></a>
                    <form id="sendNotification" action="{{ route('sendNotification', $data->no_register) }}" method="POST"
                        class="d-none">
                        @csrf
                    </form>
                    <a href="{{ route('sendNotificationFailed', $data->no_register) }}"
                        onclick="event.preventDefault(); document.getElementById('sendNotificationFailed').submit();"
                        class="py-2 px-8 bg-red-500 rounded-md text-white"><i class="fa-solid fa-xmark text-lg"></i></a>
                    <form id="sendNotificationFailed" action="{{ route('sendNotificationFailed', $data->no_register) }}"
                        method="POST" class="d-none">
                        @csrf
                    </form>
                @endif
            </div>
        </div>
        <div class="">
            <h1 class="text-2xl font-semibold">Data Registrasi</h1>
            <div class="space-y-3 mt-2 w-full">
                <div class="flex flex-row gap-1">
                    <div class="w-[20%]">No Registrasi</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->no_register }}</div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Nama User</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->user->name }}</div>
                </div>
            </div>
        </div>
        <div class=" mt-4">
            <h1 class="text-2xl font-semibold">Data Siswa</h1>
            <div class="space-y-3 mt-2">
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Nama Lengkap</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->studentData->fullname }}</div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Nama Panggilan</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->studentData->name }}</div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Jenis Kelamin</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->studentData->gender }}</div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">NIK</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->studentData->nik }}</div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Tempat, Tanggal Lahir</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->studentData->birth_place }}, {{ $data->studentData->birth_date }}</div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Asal Sekolah</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->studentData->old_school }}</div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Agama</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->studentData->religion }}</div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Alamat</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">RT {{ $data->studentData->address_rt }}, RW {{ $data->studentData->address_rw }}.
                        Desa {{ $data->studentData->address_hamlet }}, Kecamatan
                        {{ $data->studentData->address_subdistrict }}, Kab/Kota {{ $data->studentData->address_regency }}
                    </div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Tinggal Bersama</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->studentData->living_together }}</div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Nomor Telepon/WA</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->studentData->no_telp }}</div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Anak ke-</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->studentData->child_order }}</div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Jumlah Saudara</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->studentData->siblings }}</div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Hobby</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->studentData->hobby }}</div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Cita-cita</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->studentData->goal }}</div>
                </div>
            </div>
        </div>
        @if ($data->parentData)
            <div class="mt-4">
                <h1 class="text-2xl font-semibold">Data Orang Tua Siswa</h1>
                <div class="space-y-3 mt-2 w-full">
                    <div class="text-lg font-medium">Data Ayah</div>
                    <div class="flex flex-row gap-1">
                        <div class="w-[20%]">Nama</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->parentData->father_name }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">NIK</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->parentData->father_nik }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">Tempat, Tanggal Lahir</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->parentData->father_birth_place }},
                            {{ $data->parentData->father_birth_date }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">Pendidikan Terakhir</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->parentData->father_education }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">Pekerjaan</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->parentData->father_job }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">Penghasilan</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->parentData->father_income }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">Alamat</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">RT {{ $data->parentData->father_address_rt }}, RW
                            {{ $data->parentData->father_address_rw }}. Desa
                            {{ $data->parentData->father_address_hamlet }}, Kecamatan
                            {{ $data->parentData->father_address_subdistrict }}, Kab/Kota
                            {{ $data->parentData->father_address_regency }}</div>
                    </div>
                    <div class="text-lg font-medium mt-2">Data Ibu</div>
                    <div class="flex flex-row gap-1">
                        <div class="w-[20%]">Nama</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->parentData->mother_name }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">NIK</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->parentData->mother_nik }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">Tempat, Tanggal Lahir</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->parentData->mother_birth_place }},
                            {{ $data->parentData->mother_birth_date }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">Pendidikan Terakhir</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->parentData->mother_education }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">Pekerjaan</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->parentData->mother_job }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">Penghasilan</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->parentData->mother_income }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">Alamat</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">RT {{ $data->parentData->mother_address_rt }}, RW
                            {{ $data->parentData->mother_address_rw }}. Desa
                            {{ $data->parentData->mother_address_hamlet }}, Kecamatan
                            {{ $data->parentData->mother_address_subdistrict }}, Kab/Kota
                            {{ $data->parentData->mother_address_regency }}</div>
                    </div>
                </div>
            </div>
        @else
            <div class="mt-4">
                <h1 class="text-2xl font-semibold">Data Wali Siswa</h1>
                <div class="space-y-3 mt-2 w-full">
                    <div class="text-lg font-medium">Data Wali</div>
                    <div class="flex flex-row gap-1">
                        <div class="w-[20%]">Nama</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->guardianData->name }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">Tempat, Tanggal Lahir</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->guardianData->birth_place }},
                            {{ $data->guardianData->birth_date }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">Pendidikan Terakhir</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->guardianData->education }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">Pekerjaan</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">{{ $data->guardianData->job }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-[20%]">Alamat</div>
                        <div class="w-[2%]">:</div>
                        <div class="w-[78%]">RT {{ $data->guardianData->address_rt }}, RW
                            {{ $data->guardianData->address_rw }}. Desa {{ $data->guardianData->address_hamlet }},
                            Kecamatan {{ $data->guardianData->address_subdistrict }}, Kab/Kota
                            {{ $data->guardianData->address_regency }}</div>
                    </div>
                </div>
            </div>
        @endif
        <div class="mt-4">
            <h1 class="text-2xl font-semibold">Persyaratan Pendaftaran</h1>
            <div class="space-y-3 mt-2 w-full">
                <div class="flex flex-row gap-1">
                    <div class="w-[20%]">Fotocopy Akta Kelahiran</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]"><img src="{{ Storage::url($data->termData->photo_akta) }}" alt=""
                            class="h-40"></div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="w-[20%]">Fotocopy Kartu Keluarga</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]"><img src="{{ Storage::url($data->termData->photo_kk) }}" alt=""
                            class="h-40"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
