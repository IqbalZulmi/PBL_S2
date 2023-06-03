<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if (auth::check()){
            return redirect()->back()->with([
                'notifikasi' => Auth::user()->nama . ' anda masih terautentikasi sebagai ' . Auth::user()->role . ',silakan logout terlebih dahulu !',
                'type' => 'info'
            ]);
        }
        return view('login');
    }
   public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

       if (Auth::attempt($credentials)){
        $user = Auth::user();
        $request->session()->regenerate();
        if ($user->role === 'pemohon'){
            return redirect()->route('home')->with([
                'notifikasi' => 'Selamat Datang ' . Auth::user()->nama . ' anda telah berhasil login sebagai ' . Auth::user()->role,
                'type' => 'info'
            ]);
        }elseif($user->role === 'pic'){
            return redirect()->route('dashboard.tampil')->with([
                'notifikasi' => 'Selamat Datang ' . Auth::user()->nama . ' anda telah berhasil login sebagai ' . Auth::user()->role,
                'type' => 'info'
            ]);
        }elseif($user->role === 'manajer'){
            return redirect()->route('superadmin.kelola')->with([
                'notifikasi' => 'Selamat Datang ' . Auth::user()->nama . ' anda telah berhasil login sebagai ' . Auth::user()->role,
                'type' => 'info'
            ]);
        }
       }
       return redirect()->back()->withInput()->with([
        'notifikasi' => 'Login Failed !',
        'type' => 'error'
       ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with([
            'notifikasi' => 'Anda berhasil logout !',
            'type' => 'success'
        ]);
    }
}
