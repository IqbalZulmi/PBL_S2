<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
   public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

       if (Auth::attempt($credentials)){
        $user = Auth::user();

        if ($user->role === 'pemohon'){
            return redirect()->route('/home');
        }elseif($user->role === 'administrator'){
            return redirect()->route('/dashboard');
        }elseif($user->role === 'superadmin'){
            return redirect()->route('/kelola-akun');
        }
       }
       return redirect()->back()->withInput()->with([
        'notifikasi' => 'Login Failed !',
        'type' => 'danger'
       ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
