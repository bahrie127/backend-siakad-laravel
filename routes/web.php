<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SubjectController;
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

// resource route for subject with middleware auth
Route::middleware(['auth'])->group(function () {
    Route::resource('subject', SubjectController::class);
});

// resource route for schedule with middleware auth
Route::middleware(['auth'])->group(function () {
    Route::resource('schedule', ScheduleController::class);
});

// get route for generate qrcode with param schedule and with middleware auth
Route::middleware(['auth'])->group(function () {
    Route::get('generate-qrcode/{schedule}', [ScheduleController::class, 'generateQrCode'])->name('generate-qrcode');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('generate-qrcode', [ScheduleController::class, 'generateQrCode'])->name('generate-qrcode');
// });

// put route for generate qrcode with middleware auth
Route::middleware(['auth'])->group(function () {
    Route::put('generate-qrcode-update/{schedule}', [ScheduleController::class, 'generateQrCodeUpdate'])->name('generate-qrcode-update');
});

// Route::get('/login', function () {
//     return view('pages.auth.auth-login');
// })->name('login');

// Route::get('/register', function () {
//     return view('pages.auth.auth-register');
// })->name('register');

// Route::get('/forgot', function () {
//     return view('pages.auth.auth-forgot-password');
// })->name('forgot');

// Route::get('/reset-password', function () {
//     return view('pages.auth.auth-reset-password');
// })->name('reset-password');
