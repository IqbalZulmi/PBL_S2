<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;

class LoginController extends Controller
{
    public function index(){
        if (auth::check()){
            return redirect()->back();
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
            return redirect()->route('home');
        }elseif($user->role === 'administrator'){
            return redirect()->route('dashboard');
        }elseif($user->role === 'superadmin'){
            return redirect()->route('superadmin.kelola');
        }
       }
       return redirect()->back()->withInput()->with([
        'notifikasi' => 'Login Failed !',
        'type' => 'danger'
       ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
