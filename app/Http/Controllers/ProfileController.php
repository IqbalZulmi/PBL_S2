<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->nik;
        $profile = User::where('nik',$user)->get();
        return view('user.profile',['profile' => $profile]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $validatedData = $request->validate([
            'username' => ['required','unique:users,username,' . $request->old_username . ',username',
            ],
            'nik' => ['required','unique:users,nik,' . $request->old_nik . ',nik',
            ],
            'email' => ['required',Rule::unique('users', 'email')->ignore($id, 'nik'),'email:dns',
            ],
            'nama' => 'required',
            'no_wa' => 'required|numeric|min:10',
            'jurusan' => 'required',
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
            ]);

        $accounts = User::where('nik', $id)->first();
        $accounts->username = $request->username;
        $accounts->nama = $request->nama;
        $accounts->nik = $request->nik;
        $accounts->email = $request->email;
        $accounts->no_wa = $request->no_wa;
        $accounts->jurusan = $request->jurusan;

        if ($accounts->save()) {
            return redirect('/user/profile')->with([
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
        //
    }
}
