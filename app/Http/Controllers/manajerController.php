<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class manajerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = User::where('role', 'pic')->orWhere('role', 'manajer')->get();

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
            'nik' => 'required|numeric|unique:users,nik',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8|max:255',
            'nama' => 'required',
            'email' => 'required|unique:users,email|email:dns',
            'no_wa' => 'required|numeric|min:10',
            'jurusan' => 'required',
            'role' => 'required',
        ], [
            'nik.required' => 'NIK harus diisi.',
            'nik.unique' => 'NIK sudah digunakan.',
            'username.required' => 'username harus diisi.',
            'username.unique' => 'username sudah digunakan.',
            'password.required' => 'password harus diisi.',
            'password.min' => 'Password minimal 8 Karakter.',
            'nama.required' => 'nama harus diisi.',
            'email.required' => 'email harus diisi.',
            'email.email' => 'Format email Harus benar',
            'email.unique' => 'Email sudah digunakan',
            'no_wa.required' => 'no whatsapp harus diisi.',
            'no_wa.min' => 'no whatsapp minimal terdiri dari 10 angka.',
            'jurusan.required' => 'jurusan harus diisi.',
            'role.required' => 'Role harus diisi.',
        ]);


        $accounts = User::create([
        'nik' => $validatedData['nik'],
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
            'email' => ['required',Rule::unique('users', 'email')->ignore($id, 'username'),'email:dns',
            ],
            'nama' => 'required',
            'nik' => ['required','unique:users,nik,' . $request->old_nik . ',nik',
            ],
            'no_wa' => 'required|numeric|min:10',
            'jurusan' => 'required',
            'role' => 'required',
            ], [
            'username.required' => 'username harus diisi.',
            'username.unique' => 'username sudah digunakan.',
            'nama.required' => 'nama harus diisi.',
            'nik.required' => 'nik harus diisi.',
            'nik.unique' => 'NIK sudah digunakan.',
            'email.required' => 'email harus diisi.',
            'email.email' => 'Format email Harus benar',
            'email.unique' => 'Email sudah digunakan',
            'no_wa.required' => 'no_wa harus diisi.',
            'no_wa.min' => 'no whatsapp minimal terdiri dari 10 angka.',
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

        if ($accounts->isDirty()) {
            if ($accounts->save()) {
                return redirect()->route('superadmin.kelola')->with([
                    'notifikasi' => 'Data berhasil diedit!',
                    'type' => 'success'
                ]);
            } else {
                return redirect()->back()->with([
                    'notifikasi' => 'Data gagal diedit!',
                    'type' => 'error'
                ]);
            }
        } else {
            return redirect()->route('superadmin.kelola')->with([
                'notifikasi' => 'Tidak ada perubahan data.',
                'type' => 'info'
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
