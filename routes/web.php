<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CiptaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Superadmincontroller;
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

Route::get('/', function () {
    return view('landing');
});

Route::get('/home', function () {
    return view('user.home');
})->name('home');

Route::get('/riwayat/hak-cipta', [CiptaController::class, 'riwayat'])
->name('riwayat.tampil');

Route::get('/riwayat/hak-paten', function () {
    return view('user.riwayat-judul-paten');
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


Route::get('/login', [LoginController::class, 'index'])
->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function(){
    Route::middleware(CekRole::class . ':pemohon')->group(function(){
        Route::get('/user/change-password', function () {
            return view('user.change-password');
        });

        Route::get('/user/profile', function () {
            return view('user.profile');
        });

        Route::get('/hak-cipta', [CiptaController::class, 'create'])
        ->name('cipta.tampil');

        Route::post('/hak-cipta', [CiptaController::class, 'store'])
        ->name('cipta.store');

        Route::get('/status', [CiptaController::class, 'index'])
        ->name('status.tampil');

    });

    Route::middleware(CekRole::class . ':administrator')->group(function(){
        Route::get('/dashboard', [adminController::class, 'index'])
        ->name('dashboard.tampil');

        Route::get('/verif-cipta', [adminController::class, 'create'])
        ->name('cipta.tampil');

        Route::put('/verif-cipta/{id}', [adminController::class, 'update'])
        ->name('cipta.update');

        Route::get('/verif-paten', function () {
            return view('admin.verif-paten');
        });

        Route::get('/riwayat-pengajuan/hak-cipta', [adminController::class, 'riwayat'])
        ->name('riwayat-cipta.tampil');

        Route::get('/riwayat-pengajuan/paten', function () {
            return view('admin.riwayat-pengajuan-paten');
        });

        Route::get('/admin/change-password', function () {
            return view('admin.change-password');
        });

        Route::get('/admin/profile', function () {
            return view('admin.profile');
        });
    });

    Route::middleware(CekRole::class . ':superadmin')->group(function () {
        Route::get('/tambah-akun', [Superadmincontroller::class, 'create'])
        ->name('superadmin.tambah');

        Route::POST('/tambah-akun', [Superadmincontroller::class, 'store'])
        ->name('superadmin.store');

        Route::get('/superadmin/change-password', function () {
            return view('superadmin.change-password');
        });

        Route::get('/kelola-akun', [Superadmincontroller::class, 'index'])
        ->name('superadmin.kelola');

        Route::PUT('/kelola-akun/update/{id}', [Superadmincontroller::class, 'update'])
        ->name('superadmin.update');

        Route::DELETE('/kelola-akun/delete/{id}', [Superadmincontroller::class, 'destroy'])
        ->name('superadmin.destroy');
    });
});

Route::get('/register', [Registercontroller::class, 'create'])
->name('register.create');

Route::POST('/register', [Registercontroller::class, 'store'])
->name('register.store');
