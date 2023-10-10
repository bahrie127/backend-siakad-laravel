<?php

use App\Http\Controllers\UserController;
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
    return view('pages.auth.auth-login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.app.dashboard-siakad', ['type_menu' => '']);
    })->name('home');
    Route::resource('user', UserController::class);
});

//resource subject with middleware auth
Route::middleware(['auth'])->group(function () {
    Route::resource('subject', \App\Http\Controllers\SubjectController::class);
});

//resource schedule with middleware auth
Route::middleware(['auth'])->group(function () {
    Route::resource('schedule', \App\Http\Controllers\ScheduleController::class);
});

//get showqrcode
Route::get('showqrcode', [\App\Http\Controllers\QrCodeController::class, 'showQrcode'])->name('showqrcode');
//get schedule createqrcode
Route::get('createqrcode', [\App\Http\Controllers\ScheduleController::class, 'createQrcode'])->name('createqrcode');

//post schedule generateqrcode
Route::post('generateqrcode', [\App\Http\Controllers\ScheduleController::class, 'generateQrcode'])->name('generateqrcode');
