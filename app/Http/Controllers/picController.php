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
        $admin = Auth::user()->jurusan;
        $cipta = User::join('pengajuan_hak_ciptas', 'users.nik', '=', 'pengajuan_hak_ciptas.nik')
        ->where('pengajuan_hak_ciptas.status', 'sedang diproses')->Where('users.jurusan',$admin)->count();

        $paten = User::join('pengajuan_patens', 'users.nik', '=', 'pengajuan_patens.nik')
        ->where('pengajuan_patens.status', 'sedang diproses')->Where('users.jurusan',$admin)->count();

        $cipta1 = User::join('pengajuan_hak_ciptas', 'users.nik', '=', 'pengajuan_hak_ciptas.nik')->Where('users.jurusan',$admin)
        ->where('pengajuan_hak_ciptas.status', 'diterima')->orWhere('pengajuan_hak_ciptas.status', 'perlu direvisi')->count();

        $paten2 = User::join('pengajuan_patens', 'users.nik', '=', 'pengajuan_patens.nik')->Where('users.jurusan',$admin)
        ->where('pengajuan_patens.status', 'diterima')->orWhere('pengajuan_patens.status', 'perlu direvisi')->count();
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

    public function paten()
    {
        $admin = Auth::user()->jurusan;
        $join = User::join('pengajuan_patens', 'users.nik', '=', 'pengajuan_patens.nik')
        ->where('pengajuan_patens.status', 'sedang diproses')->Where('users.jurusan',$admin)->get();
        return view('admin.verif-paten',['join' => $join]);
    }

    public function riwayat()
    {
        $admin = Auth::user()->jurusan;
        $join = User::join('pengajuan_hak_ciptas', 'users.nik', '=', 'pengajuan_hak_ciptas.nik')->Where('users.jurusan',$admin)
        ->where('pengajuan_hak_ciptas.status', 'diterima')->orWhere('pengajuan_hak_ciptas.status', 'perlu direvisi')->get();
        return view('admin.riwayat-pengajuan-cipta',['join' => $join]);
    }

    public function riwayatpaten()
    {
        $admin = Auth::user()->jurusan;
        $join = User::join('pengajuan_patens', 'users.nik', '=', 'pengajuan_patens.nik')->Where('users.jurusan',$admin)
        ->where('pengajuan_patens.status', 'diterima')->orWhere('pengajuan_patens.status', 'perlu direvisi')->get();
        return view('admin.riwayat-pengajuan-paten',['join' => $join]);
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
        if ($request->status == 'diterima'){
            $cipta->alasan = null;
        }else{
            $cipta->alasan = $request->alasan;
        }


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
    public function patenupdate(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'alasan' => 'nullable'
        ], [
            'status' => 'status perlu diverifikasi',
        ]);

        $cipta = pengajuan_paten::where('id', $id)->first();
        $cipta->status = $request->status;
        if ($request->status == 'diterima'){
            $cipta->alasan = null;
        }else{
            $cipta->alasan = $request->alasan;
        }


        if($cipta->save()){
            return redirect('/verif-paten')->with([
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

    public function updateriwayat(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'alasan' => 'nullable'
        ], [
            'status' => 'status perlu diverifikasi',
        ]);

        $cipta = pengajuan_hakCipta::where('id', $id)->first();
        $cipta->status = $request->status;
        if ($request->status == 'diterima'){
            $cipta->alasan = null;
        }else{
            $cipta->alasan = $request->alasan;
        }


        if($cipta->save()){
            return redirect()->route('riwayat-cipta.tampil')->with([
                'notifikasi' => 'Berhasil diedit !',
                'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'notifikasi' => 'Gagal diedit !',
                'type' => 'danger'
            ]);
        }
    }

    public function updateriwayatpaten(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'alasan' => 'nullable'
        ], [
            'status' => 'status perlu diverifikasi',
        ]);

        $cipta = pengajuan_paten::where('id', $id)->first();
        $cipta->status = $request->status;
        if ($request->status == 'diterima'){
            $cipta->alasan = null;
        }else{
            $cipta->alasan = $request->alasan;
        }


        if($cipta->save()){
            return redirect()->route('riwayat-paten.tampil')->with([
                'notifikasi' => 'Berhasil diedit !',
                'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'notifikasi' => 'Gagal diedit !',
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
