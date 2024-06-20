@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="mb-4">
        <div class="flex flex-row gap-4 text-[#707EAE]">
            <div>Page</div>
            <div>/</div>
            <div>Dashboard</div>
        </div>
        <div class=" font-semibold text-primary text-4xl">Dashboard</div>
    </div>
    <div class="bg-white p-8 rounded-md text-gray-500 w-fit">
        <div class="text-2xl font-semibold">Pendaftar</div>
        <div class="text-6xl font-semibold">{{ $student_register }} <span class="text-lg font-medium">data</span>
        </div>
    </div>
@endsection
