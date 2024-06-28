@extends('layouts.app')

@section('title')
    Data Panitia Edit
@endsection

@section('content')
    <div class="mb-4">
        <div class="flex flex-row gap-4 text-[#707EAE]">
            <a href="/admin/dashboard">Page</a>
            <div>/</div>
            <a href="/admin/student-register">Pendaftaran</a>
            <div>/</div>
            <div>Edit</div>
        </div>
        <div class=" font-semibold text-primary text-4xl">Data Panitia</div>
    </div>
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="text-xl font-semibold">Edit Data Panitia</div>
        <div>
            <form action="{{ route('student-register-committe-update', $data->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Nama Panitia</label>
                        <input type="text" placeholder="Masukkan Nama Panitia" name="name"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" value="{{ $data->name }}" required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Nip Panitia</label>
                        <input type="text" placeholder="Masukkan Nip Panitia" name="nip"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" value="{{ $data->nip }}" required />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Tahun Ajaran</label>
                        <input type="text" placeholder="Masukkan Tahun Ajaran" name="year"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" value="{{ $data->year }}" required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">QR Code</label>
                        <input type="file" placeholder="Masukkan QR Code" name="qrcode"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" accept="image/*"
                            onchange="previewImage(event, 'family-card-preview')" />
                    </div>
                </div>
                <div class="mt-6">
                    <label for="">Preview QR Code</label>
                <div>
                    <img id="family-card-preview" src="{{ $data->qrcode }}"
                        class="w-1/2 border-none" />
                </div>
                </div>
                <button type="submit" class="w-full rounded-md bg-primary mt-8 text-white py-2 text-lg">Update
                    Data Panitia</button>
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
