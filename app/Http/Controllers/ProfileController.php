<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

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
    public function pemohonPass()
    {
        return view('user.change-password');
    }

    public function picPass()
    {
        return view('admin.change-password');
    }

    public function manajerPass()
    {
        return view('superadmin.change-password');
    }

    public function updatePass(Request $request, string $id)
    {
         // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|different:password_lama',
            'konf_password' => 'required|same:password_baru',
        ], [
            'password_lama.required' => 'Masukkan password saat ini.',
            'password_baru.required' => 'Masukkan password baru.',
            'password_baru.min' => 'Password baru minimal terdiri dari 8 karakter.',
            'password_baru.different' => 'Password baru harus berbeda dengan password saat ini.',
            'konf_password.required' => 'Masukkan konfirmasi password baru.',
            'konf_password.same' => 'Konfirmasi password baru tidak cocok.',
        ]);

        // Memeriksa kecocokan password saat ini
        if (!Hash::check($request->password_lama, auth()->user()->password)) {
            return redirect()->back()->withErrors(['password_lama' => 'Password salah.'])->withInput();
        }

        // Memperbarui password
        $user = User::where('nik',$id)->first();
        $user->password = Hash::make($request->password_baru);
        if ($user->save()) {
            return redirect()->back()->with([
                'notifikasi' => 'Password berhasil diperbarui!',
                'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'notifikasi' => 'Password gagal diperbarui!',
                'type' => 'error'
            ]);
        }
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

        if ($accounts->isDirty()) {
            if ($accounts->save()) {
                return redirect()->route('profile.tampil')->with([
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
            return redirect()->route('profile.tampil')->with([
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
        //
    }
}
