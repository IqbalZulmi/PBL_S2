<?php

namespace App\Http\Controllers;

use App\Models\pengajuan_hakCipta;
use App\Models\pengajuan_paten;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class picController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cipta = pengajuan_hakCipta::where('status','sedang diproses')->count();
        $paten = pengajuan_paten::where('status','sedang diproses')->count();
        $cipta1 = pengajuan_hakCipta::where('status','diterima')->orWhere('status','perlu direvisi')->count();
        $paten2 = pengajuan_paten::where('status','diterima')->orWhere('status','perlu direvisi')->count();
        $total = $cipta1 + $paten2;
        return view('admin.dashboard',[
            'cipta' => $cipta,
            'paten' => $paten,
            'total' => $total
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = Auth::user()->jurusan;
        $join = User::join('pengajuan_hak_ciptas', 'users.nik', '=', 'pengajuan_hak_ciptas.nik')
        ->where('pengajuan_hak_ciptas.status', 'sedang diproses')->Where('users.jurusan',$admin)->get();
        return view('admin.verif-cipta',['join' => $join]);
    }

    public function riwayat()
    {
        $join = User::join('pengajuan_hak_ciptas', 'users.nik', '=', 'pengajuan_hak_ciptas.nik')
        ->where('pengajuan_hak_ciptas.status', 'diterima')->orWhere('pengajuan_hak_ciptas.status', 'perlu direvisi')->get();
        return view('admin.riwayat-pengajuan-cipta',['join' => $join]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
            'status' => 'required',
            'alasan' => 'nullable'
        ], [
            'status' => 'status perlu diverifikasi',
        ]);

        $cipta = pengajuan_hakCipta::where('id', $id)->first();
        $cipta->status = $request->status;
        $cipta->alasan = $request->alasan;


        if($cipta->save()){
            return redirect('/verif-cipta')->with([
                'notifikasi' => 'Berhasil diverfikasi !',
                'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'notifikasi' => 'Gagal memverifikasi',
                'type' => 'danger'
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
