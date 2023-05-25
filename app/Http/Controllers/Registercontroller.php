<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8|max:255',
            'nama' => 'required',
            'email' => 'required|unique:users,email|email:dns',
            'no_wa' => 'required|numeric|min:10',
            'jurusan' => 'required',
        ], [
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
        'username' => $validatedData['username'],
        'password' => Hash::make($validatedData['password']),
        'nama' => $validatedData['nama'],
        'email' => $validatedData['email'],
        'no_wa' => $validatedData['no_wa'],
        'jurusan' => $validatedData['jurusan'],
        ]);

        if ( $accounts->save() ) {
            return redirect('/login')->with([
            'notifikasi' => 'Berhasil Membuat Akun !',
            'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
            'notifikasi' => 'Gagal Membuat Akun !',
            'type' => 'danger'
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
