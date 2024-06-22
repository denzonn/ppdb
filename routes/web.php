<?php

use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\StudentRegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('RedirectIfAuthenticated');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('information', InformationController::class);
    Route::get('student-register', [StudentRegisterController::class, 'index'])->name('student-register-index');
    Route::get('student-register/pdf/{no_register}', [StudentRegisterController::class, 'view_pdf'])->name('student-register-pdf');
    Route::get('student-register/{no_register}', [StudentRegisterController::class, 'detail'])->name('student-register-detail');
    Route::post('/send-notification/{no_register}', [StudentRegisterController::class, 'sendNotification'])->name('sendNotification');

    Route::get('get-information', [InformationController::class, 'getData'])->name('informationData');
    Route::get('get-student-register', [StudentRegisterController::class, 'getData'])->name('registerData');
});

require __DIR__.'/auth.php';
