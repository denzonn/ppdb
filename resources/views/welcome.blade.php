<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('includes.style')
</head>

<body class="bg-gray-100">
    <div class="h-screen relative">
        <div class="absolute bottom-0 right-0 z-0">
            <img src="{{ asset('images/background.png') }}" alt="" class="w-auto h-screen">
        </div>
        <div class="grid grid-cols-2 h-screen z-10 space-x-0 gap-0">
            <div class="flex flex-col justify-center px-20">
                <div class="text-5xl font-bold">
                    <div class="text-[78px]">PENERIMAAN</div><div>PESERTA DIDIK BARU</div>
                </div>
                <div class="mt-8">
                    <a href="/login" class="bg-primary text-white py-3 px-8 text-3xl font-semibold rounded-lg">GET STARTED</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
