<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\picController;
use App\Http\Controllers\CiptaController;
use App\Http\Controllers\PatenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\manajerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Registercontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CekRole;

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
Route::middleware('guest')->group(function(){
    Route::get('/', function () {
        return view('landing');
    });

    Route::get('/register', [Registercontroller::class, 'create'])
    ->name('register.create')->middleware('guest');

    Route::POST('/register', [Registercontroller::class, 'store'])
    ->name('register.store');

    Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/forgot-password', [ForgotPasswordController::class,'showForm'])->name('password.request');

    Route::post('/forgot-password', [ForgotPasswordController::class,'sendEmail'])->name('password.email');

    Route::get('/reset-password/{token}', [ForgotPasswordController::class,'showResetForm'])->name('password.reset');

    Route::post('/reset-password', [ForgotPasswordController::class,'reset'])->name('password.update');

});

Route::get('/home', function () {
    return view('user.home');
})->name('home');

Route::get('/judul/hak-cipta', [CiptaController::class, 'daftar_judul'])
->name('judul.tampil');

Route::get('/judul/hak-paten', function () {
    return view('user.daftar-judul-paten');
});

Route::get('/sejarah', function () {
    return view('user.sejarah');
});

Route::get('/unduhan', function () {
    return view('user.unduhan');
});

Route::get('/visi', function () {
    return view('user.visi');
});

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/email/verify', [Registercontroller::class, 'notifikasiVerify'])
->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [Registercontroller::class, 'verify'])
->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', [Registercontroller::class, 'resendMail'])
->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(CekRole::class . ':pemohon')->group(function(){
    Route::get('/user/change-password', [ProfileController::class, 'pemohonPass'])
    ->name('change-pass.tampil');

    Route::put('/user/change-password/{id}', [ProfileController::class, 'updatePass'])
    ->name('change-pass.edit');

    Route::get('/user/profile', [ProfileController::class, 'index'])
    ->name('profile.tampil');

    Route::put('/user/profile/{id}', [ProfileController::class, 'update'])
    ->name('profile.edit');

    Route::get('/hak-cipta', [CiptaController::class, 'create'])
    ->name('cipta.tampil')->middleware('verified');

    Route::post('/hak-cipta', [CiptaController::class, 'store'])
    ->name('cipta.store')->middleware('verified');

    Route::get('/paten', [PatenController::class, 'create'])
    ->name('paten.tampil')->middleware('verified');

    Route::post('/paten', [PatenController::class, 'store'])
    ->name('paten.store')->middleware('verified');

    Route::get('/status', [CiptaController::class, 'index'])
    ->name('status.tampil')->middleware('verified');

    Route::put('/status/{id}', [CiptaController::class, 'update'])
    ->name('cipta.update')->middleware('verified');

});

Route::middleware(CekRole::class . ':pic')->group(function(){
    Route::get('/dashboard', [picController::class, 'index'])
    ->name('dashboard.tampil');

    Route::get('/verif-cipta', [picController::class, 'create'])
    ->name('verif-cipta.tampil');

    Route::put('/verif-cipta/{id}', [picController::class, 'update'])
    ->name('verif-cipta.update');

    Route::get('/verif-paten', function () {
        return view('admin.verif-paten');
    });

    Route::get('/riwayat-pengajuan/hak-cipta', [picController::class, 'riwayat'])
    ->name('riwayat-cipta.tampil');

    Route::put('/riwayat-pengajuan/hak-cipta/{id}', [picController::class, 'updateriwayat'])
    ->name('riwayat-cipta.update');

    Route::get('/riwayat-pengajuan/paten', function () {
        return view('admin.riwayat-pengajuan-paten');
    });

    Route::get('/pic/change-password', [ProfileController::class, 'picPass'])
    ->name('pic-change-pass.tampil');

    Route::put('/pic/change-password/{id}', [ProfileController::class, 'updatePass'])
    ->name('pic-change-pass.edit');

});

Route::middleware(CekRole::class . ':manajer')->group(function () {
    Route::get('/tambah-akun', [manajerController::class, 'create'])
    ->name('superadmin.tambah');

    Route::POST('/tambah-akun', [manajerController::class, 'store'])
    ->name('superadmin.store');

    Route::get('/manajer/change-password', [ProfileController::class, 'manajerPass'])
    ->name('manajer-change-pass.tampil');

    Route::put('/manajer/change-password/{id}', [ProfileController::class, 'updatePass'])
    ->name('manajer-change-pass.edit');

    Route::get('/kelola-akun', [manajerController::class, 'index'])
    ->name('superadmin.kelola');

    Route::PUT('/kelola-akun/update/{id}', [manajerController::class, 'update'])
    ->name('superadmin.update');

    Route::DELETE('/kelola-akun/delete/{id}', [manajerController::class, 'destroy'])
    ->name('superadmin.destroy');
});
