<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Registercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'username' => 'required|unique:accounts,username',
            'password' => 'required',
            'nama' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'no_wa' => 'required',
            'jurusan' => 'required',

        ], [
            'username.required' => 'username harus diisi.',
            'username.unique' => 'username sudah digunakan.',
            'password.required' => 'password harus diisi.',
            'nama.required' => 'nama harus diisi.',
            'nik.required' => 'nik harus diisi.',
            'email.required' => 'email harus diisi.',
            'no_wa.required' => 'no whatsapp harus diisi.',
            'jurusan.required' => 'jurusan harus diisi.',
        ]);
        $accounts = new account();
        $accounts->username = $request->username;
        $accounts->password = $request->password;
        $accounts->nama = $request->nama;
        $accounts->nik = $request->nik;
        $accounts->email = $request->email;
        $accounts->no_wa = $request->no_wa;
        $accounts->jurusan = $request->jurusan;

        if ( $accounts->save() ) {
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
