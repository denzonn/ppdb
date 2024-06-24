<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth:api'])->group(function() {
    Route::get('student-register', [RegisterController::class, 'index']);
    Route::post('student-register', [RegisterController::class, 'store']);

    Route::get('information', [RegisterController::class, 'information']);
    Route::get('pdf/{no_register}', [RegisterController::class, 'pdf']);
});
