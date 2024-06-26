@extends('layouts.app')

@section('title')
    Information Edit
@endsection

@section('content')
    <div class="mb-4">
        <div class="flex flex-row gap-4 text-[#707EAE]">
            <a href="/admin/dashboard">Page</a>
            <div>/</div>
            <a href="{{ route('student-register-index') }}">Peserta Pendaftaran</a>
            <div>/</div>
            <div>Edit</div>
        </div>
        <div class=" font-semibold text-primary text-4xl">Peserta Pendaftaran </div>
    </div>
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="text-xl font-semibold">Edit Peserta Pendaftaran</div>
        <div>
            <div class="mt-3 text-xl">No Registrasi : {{ $data->no_register }}</div>
            <form action="{{ route('student-register-update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mt-6 text-xl font-semibold mb-1">Data Siswa</div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="flex flex-col gap-2">
                        <label for="">Nama Lengkap Siswa</label>
                        <input type="text" placeholder="Masukkan Nama Lengkap Siswa" name="fullname"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->fullname }}" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="">Nama Siswa</label>
                        <input type="text" placeholder="Masukkan Nama Siswa" name="name"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" value="{{ $data->studentData->name }}"
                            required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="">Jenis Kelamin</label>
                        <select name="gender" id="" class="bg-transparent border px-4 py-[8px] rounded-md">
                            <option value="Laki-laki" {{ $data->studentData->gender === 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan" {{ $data->studentData->gender === 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">NIK</label>
                        <input type="number" placeholder="Masukkan NIK" name="nik"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" value="{{ $data->studentData->nik }}"
                            required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Tempat Lahir</label>
                        <input type="text" placeholder="Masukkan Tempat Lahir" name="birth_place"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->birth_place }}" required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="birth_date"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->birth_date }}" required />
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Asal Sekolah</label>
                        <input type="text" placeholder="Masukkan Asal Sekolah" name="old_school"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->old_school }}" required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Agama</label>
                        <select name="religion" id=""
                            class="bg-transparent border px-4 py-[8px] rounded-md">
                            <option value="Islam" {{ $data->studentData->religion === 'Islam' ? 'selected' : '' }}>
                                Islam</option>
                            <option value="Kristen Protestan"
                                {{ $data->studentData->religion === 'Kristen Protestan' ? 'selected' : '' }}>
                                Kristen Protestan</option>
                            <option value="Khatolik" {{ $data->studentData->religion === 'Khatolik' ? 'selected' : '' }}>
                                Khatolik</option>
                            <option value="Hindu" {{ $data->studentData->religion === 'Hindu' ? 'selected' : '' }}>
                                Hindu</option>
                            <option value="Buddha" {{ $data->studentData->religion === 'Buddha' ? 'selected' : '' }}>
                                Buddha</option>
                        </select>
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">No Telp</label>
                        <input type="number" placeholder="Masukkan No Telp" name="no_telp"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->no_telp }}" required />
                    </div>
                </div>
                <div class="mt-6 text-xl font-semibold mb-1">Alamat</div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="flex flex-col gap-2">
                        <label for="">RT</label>
                        <input type="text" placeholder="Masukkan RT" name="address_rt"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->address_rt }}" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="">RW</label>
                        <input type="text" placeholder="Masukkan RW" name="address_rw"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->address_rw }}" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="">Dusun</label>
                        <input type="text" placeholder="Masukkan Dusun" name="address_hamlet"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->address_hamlet }}" required />
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Desa</label>
                        <input type="text" placeholder="Masukkan Desa" name="address_village"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->address_village }}" required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Kecamatan</label>
                        <input type="text" placeholder="Masukkan Kecamatan" name="address_subdistrict"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->address_subdistrict }}" required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Kab/Kota</label>
                        <input type="text" placeholder="Masukkan Kab/Kota" name="address_regency"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->address_regency }}" required />
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Tinggal Bersama</label>
                        <select name="living_together" id=""
                            class="bg-transparent border px-4 py-[8px] rounded-md">
                            <option value="Orang Tua"
                                {{ $data->studentData->living_together === 'Orang Tua' ? 'selected' : '' }}>
                                Orang Tua</option>
                            <option value="Wali" {{ $data->studentData->living_together === 'Wali' ? 'selected' : '' }}>
                                Wali</option>
                            <option value="Pondok"
                                {{ $data->studentData->living_together === 'Pondok' ? 'selected' : '' }}>
                                Pondok</option>
                            <option value="Panti Asuhan"
                                {{ $data->studentData->living_together === 'Panti Asuhan' ? 'selected' : '' }}>
                                Panti Asuhan</option>
                            <option value="Dll" {{ $data->studentData->living_together === 'Dll' ? 'selected' : '' }}>
                                Dll</option>
                        </select>
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Anak ke-</label>
                        <input type="text" placeholder="Masukkan Anak ke-" name="child_order"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->child_order }}" required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Jumlah Saudara</label>
                        <input type="text" placeholder="Masukkan Jumlah Saudara" name="siblings"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->siblings }}" required />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Hobby</label>
                        <input type="text" placeholder="Masukkan Hobby" name="hobby"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->hobby }}" required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Cita-cita</label>
                        <input type="text" placeholder="Masukkan Cita-cita" name="goal"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            value="{{ $data->studentData->goal }}" required />
                    </div>
                </div>
                @if ($data->parentData)
                    <div class="mt-6 text-xl font-semibold mb-1">Data Orang Tua</div>
                    <div class="mt-6 text-xl font-semibold mb-1">Ayah</div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="flex flex-col gap-2">
                            <label for="">Nama</label>
                            <input type="text" placeholder="Masukkan Nama Ayah" name="parent_father_name"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->father_name }}" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="">NIK</label>
                            <input type="text" placeholder="Masukkan NIK" name="parent_father_nik"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->father_nik }}" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="">Pendidikan Terakhir</label>
                            <select name="parent_father_education" id=""
                                class="bg-transparent border px-4 py-[8px] rounded-md">
                                <option value="Tidak Sekolah"
                                    {{ $data->parentData->father_education === 'Tidak Sekolah' ? 'selected' : '' }}>
                                    Tidak Sekolah</option>
                                <option value="SD"
                                    {{ $data->parentData->father_education === 'SD' ? 'selected' : '' }}>
                                    SD</option>
                                <option value="SMP"
                                    {{ $data->parentData->father_education === 'SMP' ? 'selected' : '' }}>
                                    SMP</option>
                                <option value="SMA"
                                    {{ $data->parentData->father_education === 'SMA' ? 'selected' : '' }}>
                                    SMA</option>
                                <option value="Diploma"
                                    {{ $data->parentData->father_education === 'Diploma' ? 'selected' : '' }}>
                                    Diploma</option>
                                <option value="Sarjana"
                                    {{ $data->parentData->father_education === 'Sarjana' ? 'selected' : '' }}>
                                    Sarjana</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-4 gap-3">
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Tempat Lahir</label>
                            <input type="text" placeholder="Masukkan Tempat Lahir Ayah"
                                name="parent_father_birth_place" class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->father_birth_place }}" required />
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" placeholder="Masukkan Tanggal Lahir" name="parent_father_birth_date"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->father_birth_date }}" required />
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Pekerjaan</label>
                            <input type="text" placeholder="Masukkan Pekerjaan" name="parent_father_job"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->father_job }}" required />
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Penghasilan</label>
                            <select name="parent_father_income" id=""
                                class="bg-transparent border px-4 py-[8px] rounded-md">
                                <option value="Kurang dari 500.000"
                                    {{ $data->parentData->father_income === 'Kurang dari 500.000' ? 'selected' : '' }}>
                                    Kurang dari 500.000</option>
                                <option value="500.000 - 999.999"
                                    {{ $data->parentData->father_income === '500.000 - 999.999' ? 'selected' : '' }}>
                                    500.000 - 999.999</option>
                                <option value="1 Juta - 1.999.999"
                                    {{ $data->parentData->father_income === '1 Juta - 1.999.999' ? 'selected' : '' }}>
                                    1 Juta - 1.999.999</option>
                                <option value="2 Juta - 4.999.999"
                                    {{ $data->parentData->father_income === '2 Juta - 4.999.999' ? 'selected' : '' }}>
                                    2 Juta - 4.999.999</option>
                                <option value="5 Juta - 20 Juta"
                                    {{ $data->parentData->father_income === '5 Juta - 20 Juta' ? 'selected' : '' }}>
                                    5 Juta - 20 Juta</option>
                                <option value="Lebih dari 20 Juta"
                                    {{ $data->parentData->father_income === 'Lebih dari 20 Juta' ? 'selected' : '' }}>
                                    Lebih dari 20 Juta</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-6 text-lg mb-1">Alamat</div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="flex flex-col gap-2">
                            <label for="">RT</label>
                            <input type="text" placeholder="Masukkan RT" name="parent_father_address_rt"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->father_address_rt }}" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="">RW</label>
                            <input type="text" placeholder="Masukkan RW" name="parent_father_address_rw"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->father_address_rw }}" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="">Dusun</label>
                            <input type="text" placeholder="Masukkan Dusun" name="parent_father_address_hamlet"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->father_address_hamlet }}" required />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Desa</label>
                            <input type="text" placeholder="Masukkan Desa" name="parent_father_address_village"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->father_address_village }}" required />
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Kecamatan</label>
                            <input type="text" placeholder="Masukkan Kecamatan"
                                name="parent_father_address_subdistrict"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->father_address_subdistrict }}" required />
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Kab/Kota</label>
                            <input type="text" placeholder="Masukkan Kab/Kota" name="parent_father_address_regency"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->father_address_regency }}" required />
                        </div>
                    </div>
                    <div class="mt-6 text-xl font-semibold mb-1">Ibu</div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="flex flex-col gap-2">
                            <label for="">Nama</label>
                            <input type="text" placeholder="Masukkan Nama Ibu" name="parent_mother_name"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->mother_name }}" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="">NIK</label>
                            <input type="text" placeholder="Masukkan NIK" name="parent_mother_nik"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->mother_nik }}" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="">Pendidikan Terakhir</label>
                            <select name="parent_mother_education" id=""
                                class="bg-transparent border px-4 py-[8px] rounded-md">
                                <option value="Tidak Sekolah"
                                    {{ $data->parentData->mother_education === 'Tidak Sekolah' ? 'selected' : '' }}>
                                    Tidak Sekolah</option>
                                <option value="SD"
                                    {{ $data->parentData->mother_education === 'SD' ? 'selected' : '' }}>
                                    SD</option>
                                <option value="SMP"
                                    {{ $data->parentData->mother_education === 'SMP' ? 'selected' : '' }}>
                                    SMP</option>
                                <option value="SMA"
                                    {{ $data->parentData->mother_education === 'SMA' ? 'selected' : '' }}>
                                    SMA</option>
                                <option value="Diploma"
                                    {{ $data->parentData->mother_education === 'Diploma' ? 'selected' : '' }}>
                                    Diploma</option>
                                <option value="Sarjana"
                                    {{ $data->parentData->mother_education === 'Sarjana' ? 'selected' : '' }}>
                                    Sarjana</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-4 gap-3">
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Tempat Lahir</label>
                            <input type="text" placeholder="Masukkan Tempat Lahir Ayah"
                                name="parent_mother_birth_place" class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->mother_birth_place }}" required />
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" placeholder="Masukkan Tanggal Lahir" name="parent_mother_birth_date"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->mother_birth_date }}" required />
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Pekerjaan</label>
                            <input type="text" placeholder="Masukkan Pekerjaan" name="parent_mother_job"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->mother_job }}" required />
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Penghasilan</label>
                            <select name="parent_mother_income" id=""
                                class="bg-transparent border px-4 py-[8px] rounded-md">
                                <option value="Kurang dari 500.000"
                                    {{ $data->parentData->mother_income === 'Kurang dari 500.000' ? 'selected' : '' }}>
                                    Kurang dari 500.000</option>
                                <option value="500.000 - 999.999"
                                    {{ $data->parentData->mother_income === '500.000 - 999.999' ? 'selected' : '' }}>
                                    500.000 - 999.999</option>
                                <option value="1 Juta - 1.999.999"
                                    {{ $data->parentData->mother_income === '1 Juta - 1.999.999' ? 'selected' : '' }}>
                                    1 Juta - 1.999.999</option>
                                <option value="2 Juta - 4.999.999"
                                    {{ $data->parentData->mother_income === '2 Juta - 4.999.999' ? 'selected' : '' }}>
                                    2 Juta - 4.999.999</option>
                                <option value="5 Juta - 20 Juta"
                                    {{ $data->parentData->mother_income === '5 Juta - 20 Juta' ? 'selected' : '' }}>
                                    5 Juta - 20 Juta</option>
                                <option value="Lebih dari 20 Juta"
                                    {{ $data->parentData->mother_income === 'Lebih dari 20 Juta' ? 'selected' : '' }}>
                                    Lebih dari 20 Juta</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-6 text-lg mb-1">Alamat</div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="flex flex-col gap-2">
                            <label for="">RT</label>
                            <input type="text" placeholder="Masukkan RT" name="parent_mother_address_rt"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->mother_address_rt }}" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="">RW</label>
                            <input type="text" placeholder="Masukkan RW" name="parent_mother_address_rw"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->mother_address_rw }}" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="">Dusun</label>
                            <input type="text" placeholder="Masukkan Dusun" name="parent_mother_address_hamlet"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->mother_address_hamlet }}" required />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Desa</label>
                            <input type="text" placeholder="Masukkan Desa" name="parent_mother_address_village"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->mother_address_village }}" required />
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Kecamatan</label>
                            <input type="text" placeholder="Masukkan Kecamatan"
                                name="parent_mother_address_subdistrict"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->mother_address_subdistrict }}" required />
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Kab/Kota</label>
                            <input type="text" placeholder="Masukkan Kab/Kota" name="parent_mother_address_regency"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->parentData->mother_address_regency }}" required />
                        </div>
                    </div>
                @else
                    <div class="mt-6 text-xl font-semibold mb-1">Data Wali</div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="flex flex-col gap-2">
                            <label for="">Nama</label>
                            <input type="text" placeholder="Masukkan Nama Wali" name="guardian_name"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->guardianData->name }}" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="">Tempat Lahir</label>
                            <input type="text" placeholder="Masukkan Tempat Lahir Wali"
                                name="guardian_birth_place" class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->guardianData->birth_place }}" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" placeholder="Masukkan Tanggal Lahir" name="guardian_birth_date"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->guardianData->birth_date }}" required />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Pendidikan Terakhir</label>
                            <select name="parent_education" id=""
                                class="bg-transparent border px-4 py-[8px] rounded-md">
                                <option value="Tidak Sekolah"
                                    {{ $data->guardianData->education === 'Tidak Sekolah' ? 'selected' : '' }}>
                                    Tidak Sekolah</option>
                                <option value="SD"
                                    {{ $data->guardianData->education === 'SD' ? 'selected' : '' }}>
                                    SD</option>
                                <option value="SMP"
                                    {{ $data->guardianData->education === 'SMP' ? 'selected' : '' }}>
                                    SMP</option>
                                <option value="SMA"
                                    {{ $data->guardianData->education === 'SMA' ? 'selected' : '' }}>
                                    SMA</option>
                                <option value="Diploma"
                                    {{ $data->guardianData->education === 'Diploma' ? 'selected' : '' }}>
                                    Diploma</option>
                                <option value="Sarjana"
                                    {{ $data->guardianData->education === 'Sarjana' ? 'selected' : '' }}>
                                    Sarjana</option>
                            </select>
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Pekerjaan</label>
                            <input type="text" placeholder="Masukkan Pekerjaan" name="guardian_job"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->guardianData->job }}" required />
                        </div>
                    </div>
                    <div class="mt-6 text-lg mb-1">Alamat</div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="flex flex-col gap-2">
                            <label for="">RT</label>
                            <input type="text" placeholder="Masukkan RT" name="guardian_address_rt"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->guardianData->address_rt }}" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="">RW</label>
                            <input type="text" placeholder="Masukkan RW" name="guardian_address_rw"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->guardianData->address_rw }}" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="">Dusun</label>
                            <input type="text" placeholder="Masukkan Dusun" name="guardian_address_hamlet"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->guardianData->address_hamlet }}" required />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Desa</label>
                            <input type="text" placeholder="Masukkan Desa" name="guardian_address_village"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->guardianData->address_village }}" required />
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Kecamatan</label>
                            <input type="text" placeholder="Masukkan Kecamatan"
                                name="guardian_address_subdistrict"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->guardianData->address_subdistrict }}" required />
                        </div>
                        <div class="mt-6 flex flex-col gap-2">
                            <label for="">Kab/Kota</label>
                            <input type="text" placeholder="Masukkan Kab/Kota" name="guardian_address_regency"
                                class="w-full border px-4 py-2 rounded-md bg-transparent"
                                value="{{ $data->guardianData->address_regency }}" required />
                        </div>
                    </div>
                @endif

                <div class="mt-6 text-xl font-semibold mb-1">Persyaratan Pendaftaran</div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="flex flex-col gap-2">
                        <label for="photo_akta">Fc. Akta Kelahiran</label>
                        <input type="file" id="photo_akta" name="photo_akta"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            accept="image/*" onchange="previewImage(event, 'birth-certificate-preview')"  />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="photo_kk">Fc. Kartu Keluarga</label>
                        <input type="file" id="photo_kk" name="photo_kk"
                            class="w-full border px-4 py-2 rounded-md bg-transparent"
                            accept="image/*" onchange="previewImage(event, 'family-card-preview')"  />
                    </div>
                </div>
                <div class=" mt-6 grid grid-cols-2 gap-3">
                    <div class="flex flex-col gap-2">
                        <label for="">Preview Akta Kelahiran</label>
                        <div>
                            <img id="birth-certificate-preview" src="{{ asset('storage/' . $data->termData->photo_akta) }}" class="w-full border-none" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="">Preview Kartu Keluarga</label>
                        <div>
                            <img id="family-card-preview" src="{{ asset('storage/' . $data->termData->photo_kk) }}" class="w-full border-none" />
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full rounded-md bg-primary mt-8 text-white py-2 text-lg">Update
                    Data</button>
            </form>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            const preview = document.getElementById(previewId);

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
