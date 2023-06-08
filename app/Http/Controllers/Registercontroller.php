<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Registercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function notifikasiVerify()
    {
        return view('verify-email');
    }

    public function verify (EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/home')->with([
            'notifikasi' => 'Email Berhasil Diverifikasi',
            'type' => 'success'
        ]);

    }
    public function resendMail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with([
            'notifikasi' => 'Link verifikasi telah dikirim ke email anda',
            'type' => 'success'
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|numeric|unique:users,nik',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8|max:255',
            'nama' => 'required',
            'email' => 'required|unique:users,email|email:dns',
            'no_wa' => 'required|numeric|min:10',
            'jurusan' => 'required',
        ], [
            'nik.required' => 'nik harus diisi.',
            'nik.unique' => 'NIK sudah digunakan.',
            'username.required' => 'username harus diisi.',
            'username.unique' => 'username sudah digunakan.',
            'password.required' => 'password harus diisi.',
            'password.min' => 'Password minimal 8 Karakter.',
            'nama.required' => 'nama harus diisi.',
            'email.required' => 'email harus diisi.',
            'email.unique' => 'Email sudah digunakan',
            'email.email' => 'Format email Harus benar',
            'no_wa.required' => 'no whatsapp harus diisi.',
            'no_wa.min' => 'no whatsapp minimal terdiri dari 10 angka.',
            'jurusan.required' => 'jurusan harus diisi.',
        ]);


        $accounts = User::create([
        'nik' => $validatedData['nik'],
        'username' => $validatedData['username'],
        'password' => Hash::make($validatedData['password']),
        'nama' => $validatedData['nama'],
        'email' => $validatedData['email'],
        'no_wa' => $validatedData['no_wa'],
        'jurusan' => $validatedData['jurusan'],
        ]);

        if ( $accounts->save() ) {
            $accounts->notify(new VerifyEmail($validatedData['nik']));
            return redirect('/login')->with([
            'notifikasi' => 'Berhasil Membuat Akun !',
            'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
            'notifikasi' => 'Gagal Membuat Akun !',
            'type' => 'error'
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
