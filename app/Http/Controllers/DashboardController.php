<?php

namespace App\Http\Controllers;

use App\Models\StudentRegister;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $student_register = StudentRegister::count();

        return view('pages.dashboard', compact('student_register'));
    }
}
