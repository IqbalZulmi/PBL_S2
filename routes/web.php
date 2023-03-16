<?php

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
    return view('home');
});

Route::get('/change-password', function () {
    return view('change-password');
});

Route::get('/hak-cipta', function () {
    return view('hak-cipta');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/riwayat-judul', function () {
    return view('riwayat-judul');
});

Route::get('/sejarah', function () {
    return view('sejarah');
});

Route::get('/status', function () {
    return view('status');
});

Route::get('/unduhan', function () {
    return view('unduhan');
});

Route::get('/visi', function () {
    return view('visi');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/verif-cipta', function () {
    return view('verif-cipta');
});

Route::get('/verif-paten', function () {
    return view('verif-paten');
});

Route::get('/riwayat-pengajuan', function () {
    return view('riwayat-pengajuan');
});
