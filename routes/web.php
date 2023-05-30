<?php

use App\Http\Controllers\picController;
use App\Http\Controllers\CiptaController;
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

Route::get('/', function () {
    return view('landing');
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


Route::get('/login', [LoginController::class, 'index'])
->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(CekRole::class . ':pemohon')->group(function(){
    Route::get('/user/change-password', function () {
        return view('user.change-password');
    });

    Route::get('/user/profile', [ProfileController::class, 'index'])
    ->name('profile.tampil');

    Route::put('/user/profile/{id}', [ProfileController::class, 'update'])
    ->name('profile.edit');

    Route::get('/hak-cipta', [CiptaController::class, 'create'])
    ->name('cipta.tampil');

    Route::post('/hak-cipta', [CiptaController::class, 'store'])
    ->name('cipta.store');

    Route::get('/status', [CiptaController::class, 'index'])
    ->name('status.tampil');

    Route::put('/status/{id}', [CiptaController::class, 'update'])
    ->name('cipta.update');

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

    Route::put('/riwayat-pengajuan/hak-cipta', [picController::class, 'updateriwayat'])
    ->name('riwayat-cipta.update');

    Route::get('/riwayat-pengajuan/paten', function () {
        return view('admin.riwayat-pengajuan-paten');
    });

    Route::get('/admin/change-password', function () {
        return view('admin.change-password');
    });

});

Route::middleware(CekRole::class . ':manajer')->group(function () {
    Route::get('/tambah-akun', [manajerController::class, 'create'])
    ->name('superadmin.tambah');

    Route::POST('/tambah-akun', [manajerController::class, 'store'])
    ->name('superadmin.store');

    Route::get('/superadmin/change-password', function () {
        return view('superadmin.change-password');
    });

    Route::get('/kelola-akun', [manajerController::class, 'index'])
    ->name('superadmin.kelola');

    Route::PUT('/kelola-akun/update/{id}', [manajerController::class, 'update'])
    ->name('superadmin.update');

    Route::DELETE('/kelola-akun/delete/{id}', [manajerController::class, 'destroy'])
    ->name('superadmin.destroy');
});

Route::get('/register', [Registercontroller::class, 'create'])
->name('register.create');

Route::POST('/register', [Registercontroller::class, 'store'])
->name('register.store');
