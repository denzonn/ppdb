@php
    $committees = \App\Models\Committe::all();
@endphp
<div class="flex flex-col h-full justify-between text-gray-600">
    <ul class="flex flex-col gap-4 menu text-base">
        <a href="/admin/dashboard"
            class="{{ request()->is('admin/dashboard*') ? 'bg-primary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-primary hover:text-white transition">
            <div class="flex flex-row gap-2 items-center"><i class="fa-solid fa-house"></i> Dashboard</div>
        </a>
        <a href="/admin/information"
            class="{{ request()->is('admin/information*') ? 'bg-primary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-primary hover:text-white transition">
            <div class="flex flex-row gap-2 items-center"><i class="fa-solid fa-circle-info"></i>Informasi Pendaftaran
            </div>
        </a>
        <a href="/admin/student-register"
            class="{{ request()->is('admin/student-register') ? 'bg-primary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-primary hover:text-white transition">
            <div class="flex flex-row gap-2 items-center"><i class="fa-solid fa-user-plus text-sm"></i> Peserta
                Pendaftaran</div>
        </a>
        @foreach ($committees as $item)
            <a href="{{ route('student-register-committe', $item->id) }}"
                class="{{ request()->is('admin/student-register/committe*') ? 'bg-primary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-primary hover:text-white transition">
                <div class="flex flex-row gap-2 items-center"><i class="fa-solid fa-user-plus text-sm"></i> Data Panitia
                </div>
            </a>
        @endforeach
    </ul>
    <div>
        <ul>
            <li class="py-2 rounded-md px-6 hover:bg-red-500 hover:text-white  transition">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="fa-solid fa-right-from-bracket pr-1"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
