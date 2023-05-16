<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class Superadmincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = User::where('role', 'administrator')->orWhere('role', 'superadmin')->get();

        return view('superadmin.kelola', ['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.tambah');
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
            'email' => 'required|email:dns',
            'no_wa' => 'required',
            'jurusan' => 'required',
            'role' => 'required',
        ], [
            'username.required' => 'username harus diisi.',
            'username.unique' => 'username sudah digunakan.',
            'password.required' => 'password harus diisi.',
            'password.min' => 'Password minimal 8 Karakter.',
            'nama.required' => 'nama harus diisi.',
            'email.required' => 'email harus diisi.',
            'email.email' => 'Format email Harus benar',
            'no_wa.required' => 'no whatsapp harus diisi.',
            'jurusan.required' => 'jurusan harus diisi.',
            'role.required' => 'Role harus diisi.',
        ]);


        $accounts = User::create([
        'username' => $validatedData['username'],
        'password' => Hash::make($validatedData['password']),
        'nama' => $validatedData['nama'],
        'email' => $validatedData['email'],
        'no_wa' => $validatedData['no_wa'],
        'jurusan' => $validatedData['jurusan'],
        'role' => $validatedData['role']
        ]);

        if ( $accounts->save() ) {
            return redirect('/kelola-akun')->with([
            'notifikasi' => 'Data Berhasil disimpan !',
            'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
            'notifikasi' => 'Data gagal disimpan !',
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'username' => ['required','unique:users,username,' . $request->old_username . ',username',
            ],
            'nama' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'no_wa' => 'required',
            'jurusan' => 'required',
            'role' => 'required',
            ], [
            'username.required' => 'username harus diisi.',
            'username.unique' => 'username sudah digunakan.',
            'nama.required' => 'nama harus diisi.',
            'nik.required' => 'nik harus diisi.',
            'email.required' => 'email harus diisi.',
            'email.email' => 'Format email harus benar',
            'no_wa.required' => 'no_wa harus diisi.',
            'jurusan.required' => 'jurusan harus diisi.',
            'role.required' => 'role harus diisi.',
            ]);

        $accounts = User::where('username', $id)->first();
        $accounts->username = $request->username;
        $accounts->nama = $request->nama;
        $accounts->nik = $request->nik;
        $accounts->email = $request->email;
        $accounts->no_wa = $request->no_wa;
        $accounts->jurusan = $request->jurusan;
        $accounts->role = $request->role;

        if ($accounts->save()) {
            return redirect('/kelola-akun')->with([
            'notifikasi' => 'Data Berhasil diedit !',
            'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
            'notifikasi' => 'Data gagal diedit !',
            'type' => 'error'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $accounts = User::where(['nik' => $id]);
        if ($accounts->count() < 1) {
            return redirect('/kelola-akun')->with([
            'notifikasi' => 'Data siswa tidak ditemukan !',
            'type' => 'error'
            ]);
        }
        if ( $accounts->first()->delete()) {
            return redirect('/kelola-akun')->with([
            'notifikasi' => 'Data Berhasil dihapus !',
            'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
            'notifikasi' => 'Data gagal dihapus !',
            'type' => 'error'
            ]);
        }
    }
}
