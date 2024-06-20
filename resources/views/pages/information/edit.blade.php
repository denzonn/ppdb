@extends('layouts.app')

@section('title')
    Information Edit
@endsection

@section('content')
    <div class="mb-4">
        <div class="flex flex-row gap-4 text-[#707EAE]">
            <a href="/admin/dashboard">Page</a>
            <div>/</div>
            <a href="/admin/information">Informasi Pendaftaran</a>
            <div>/</div>
            <div>Edit</div>
        </div>
        <div class=" font-semibold text-primary text-4xl">Informasi Pendaftaran</div>
    </div>
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="text-xl font-semibold">Edit Informasi</div>
        <div>
            <form action="{{ route('information.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-6 flex flex-col gap-2">
                    <label for="">Informasi</label>
                    <textarea name="information" id="editor" cols="30" rows="10">{!! $data->information !!}</textarea>
                </div>

                <button type="submit" class="w-full rounded-md bg-primary mt-8 text-white py-2 text-lg">Update
                    Informasi</button>
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
@endpush
