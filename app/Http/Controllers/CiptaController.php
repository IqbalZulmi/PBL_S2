<?php

namespace App\Http\Controllers;

use App\Models\pengajuan_hakCipta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CiptaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function daftar_judul()
    {
        $cipta = pengajuan_hakCipta::where('status','diterima')->get();
        return view('user.daftar-judul-cipta',['cipta' => $cipta]);
    }

    public function index()
    {
        $user = Auth::user()->nik;
        $cipta = pengajuan_hakCipta::where('nik',$user)->get();
        return view('user.status', ['pengajuan_hakciptas' => $cipta]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('user.hak-cipta')->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'kkt' => 'required',
            'judul_usulan' => 'required',
            'file_formulir_permohonan' => 'required|file|mimes:pdf',
            'file_scan_ktp' => 'required|file|mimes:pdf',
            'file_scan_npwp' => 'required|file|mimes:pdf',
            'file_contoh_ciptaan' => 'required|file|mimes:pdf',
            'file_surat_pernyataan_hak_cipta' => 'required|file|mimes:pdf',
            'file_surat_pengalihan_hak_cipta' => 'required|file|mimes:pdf',
            'usulan' => 'required',
            'file_salinan_pks' => 'file|mimes:pdf',
        ], [
            'nik.required' => 'nik harus diisi',
            'judul_usulan.required' => 'judul usulan harus diisi',
            'file_formulir_permohonan.required' => 'file formulir permohonan harus diunggah',
            'file_formulir_permohonan.mimes' => 'file formulir permohonan harus berformat PDF',
            'file_scan_ktp.required' => 'file scan KTP harus diunggah',
            'file_scan_ktp.mimes' => 'file scan KTP harus berformat PDF',
            'file_scan_npwp.required' => 'file scan NPWP harus diunggah',
            'file_scan_npwp.mimes' => 'file scan NPWP harus berformat PDF',
            'file_contoh_ciptaan.required' => 'file contoh ciptaan harus diunggah',
            'file_contoh_ciptaan.mimes' => 'file contoh ciptaan harus berformat PDF',
            'file_surat_pernyataan_hak_cipta.required' => 'file surat pernyataan hak cipta harus diunggah',
            'file_surat_pernyataan_hak_cipta.mimes' => 'file surat pernyataan hak cipta harus berformat PDF',
            'file_surat_pengalihan_hak_cipta.required' => 'file surat pengalihan hak cipta harus diunggah',
            'file_surat_pengalihan_hak_cipta.mimes' => 'file surat pengalihan hak cipta harus berformat PDF',
            'usulan.required' => 'usulan harus diisi',
            'file_salinan_pks.mimes' => 'file salinan PKS harus berformat PDF',
        ]);

        // Handle file public/file
        $fileFormulir = $request->file('file_formulir_permohonan')->store('public/file');
        $fileFormulir = basename($fileFormulir);
        $fileScanKTP = $request->file('file_scan_ktp')->store('public/file');
        $fileScanKTP = basename($fileScanKTP);
        $fileScanNPWP = $request->file('file_scan_npwp')->store('public/file');
        $fileScanNPWP = basename($fileScanNPWP);
        $fileContohCiptaan = $request->file('file_contoh_ciptaan')->store('public/file');
        $fileContohCiptaan = basename($fileContohCiptaan);
        $fileSuratPernyataan = $request->file('file_surat_pernyataan_hak_cipta')->store('public/file');
        $fileSuratPernyataan = basename($fileSuratPernyataan);
        $fileSuratPengalihan = $request->file('file_surat_pengalihan_hak_cipta')->store('public/file');
        $fileSuratPengalihan = basename($fileSuratPengalihan);
        if($request->hasFile('file_salinan_pks')){
            $fileSalinanPKS = $request->file('file_salinan_pks')->store('public/file');
            $fileSalinanPKS = basename($fileSalinanPKS);
        }else{
            $fileSalinanPKS = null;
        }

        // Move uploaded files to a storage location


        $cipta = new pengajuan_hakCipta();
        $cipta->nik = $request->nik;
        $cipta->kkt = $request->kkt;
        $cipta->judul_usulan = $request->judul_usulan;
        $cipta->usulan = $request->usulan;

        $cipta->file_formulir_permohonan = $fileFormulir ? 'file/' . $fileFormulir : null;
        $cipta->file_scan_ktp = $fileScanKTP ? 'file/' . $fileScanKTP : null;
        $cipta->file_scan_npwp = $fileScanNPWP ? 'file/' . $fileScanNPWP : null;
        $cipta->file_contoh_ciptaan = $fileContohCiptaan ? 'file/' . $fileContohCiptaan : null;
        $cipta->file_surat_pernyataan_hak_cipta = $fileSuratPernyataan ? 'file/' . $fileSuratPernyataan : null;
        $cipta->file_surat_pengalihan_hak_cipta = $fileSuratPengalihan ? 'file/' . $fileSuratPengalihan : null;
        $cipta->file_salinan_pks = $fileSalinanPKS ? 'file/' . $fileSalinanPKS : null;


        if($cipta->save()){
            return redirect('/status')->with([
                'notifikasi' => 'Berhasil mengirim pengajuan !',
                'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'notifikasi' => 'Gagal mengirim pengajuan',
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
        $cipta = pengajuan_hakCipta::where('id',$id)->firstOrFail();
        $validatedData = $request->validate([
            'nik' => 'required',
            'kkt' => 'required',
            'judul_usulan' => 'required',
            'file_formulir_permohonan' => 'nullable|file|mimes:pdf',
            'file_scan_ktp' => 'nullable|file|mimes:pdf',
            'file_scan_npwp' => 'nullable|file|mimes:pdf',
            'file_contoh_ciptaan' => 'nullable|file|mimes:pdf',
            'file_surat_pernyataan_hak_cipta' => 'nullable|file|mimes:pdf',
            'file_surat_pengalihan_hak_cipta' => 'nullable|file|mimes:pdf',
            'file_salinan_pks' => 'nullable|file|mimes:pdf',
        ], [
            'nik.required' => 'nik harus diisi',
            'kkt.required' => 'kkt harus diisi',
            'judul_usulan.required' => 'judul usulan harus diisi',
            'file_formulir_permohonan.mimes' => 'file formulir permohonan harus berformat PDF',
            'file_scan_ktp.mimes' => 'file scan KTP harus berformat PDF',
            'file_scan_npwp.mimes' => 'file scan NPWP harus berformat PDF',
            'file_contoh_ciptaan.mimes' => 'file contoh ciptaan harus berformat PDF',
            'file_surat_pernyataan_hak_cipta.mimes' => 'file surat pernyataan hak cipta harus berformat PDF',
            'file_surat_pengalihan_hak_cipta.mimes' => 'file surat pengalihan hak cipta harus berformat PDF',
            'file_salinan_pks.mimes' => 'file salinan PKS harus berformat PDF',
        ]);

        if ($request->hasFile('file_formulir_permohonan')) {
            $old_file_formulir_permohonan = $cipta->file_formulir_permohonan;
            if (!empty($old_file_formulir_permohonan) && is_file('storage/'.$old_file_formulir_permohonan)) {
                unlink('storage/'.$old_file_formulir_permohonan);
            }

            $fileFormulir = $request->file('file_formulir_permohonan')->store('public/file');
            $fileFormulir = basename($fileFormulir);
            $cipta->file_formulir_permohonan = $fileFormulir ? 'file/' . $fileFormulir : null;
        }else{
            $fileFormulir = $cipta->file_formulir_permohonan;
        }

        if ($request->hasFile('file_scan_ktp')) {
            $old_file_scan_ktp = $cipta->file_scan_ktp;
            if (!empty($old_file_scan_ktp) && is_file('storage/'.$old_file_scan_ktp)) {
                unlink('storage/'.$old_file_scan_ktp);
            }

            $fileScanKTP = $request->file('file_scan_ktp')->store('public/file');
            $fileScanKTP = basename($fileScanKTP);
            $cipta->file_scan_ktp = $fileScanKTP ? 'file/' . $fileScanKTP : null;
        }else{
            $fileScanKTP = $cipta->file_scan_ktp;
        }

        if ($request->hasFile('file_scan_npwp')) {
            $old_file_scan_npwp = $cipta->file_scan_npwp;
            if (!empty($old_file_scan_npwp) && is_file('storage/'.$old_file_scan_npwp)) {
                unlink('storage/'.$old_file_scan_npwp);
            }

            $fileScanNPWP = $request->file('file_scan_npwp')->store('public/file');
            $fileScanNPWP = basename($fileScanNPWP);
            $cipta->file_scan_npwp = $fileScanNPWP ? 'file/' . $fileScanNPWP : null;
        }else{
            $fileScanNPWP = $cipta->file_scan_npwp;
        }

        if ($request->hasFile('file_contoh_ciptaan')) {
            $old_file_contoh_ciptaan = $cipta->file_contoh_ciptaan;
            if (!empty($old_file_contoh_ciptaan) && is_file('storage/'.$old_file_contoh_ciptaan)) {
                unlink('storage/'.$old_file_contoh_ciptaan);
            }

            $fileContohCiptaan = $request->file('file_contoh_ciptaan')->store('public/file');
            $fileContohCiptaan = basename($fileContohCiptaan);
            $cipta->file_contoh_ciptaan = $fileContohCiptaan ? 'file/' . $fileContohCiptaan : null;
        }else{
            $fileContohCiptaan = $cipta->file_contoh_ciptaan;
        }

        if ($request->hasFile('file_surat_pernyataan_hak_cipta')) {
            $old_file_surat_pernyataan_hak_cipta = $cipta->file_surat_pernyataan_hak_cipta;
            if (!empty($old_file_surat_pernyataan_hak_cipta) && is_file('storage/'.$old_file_surat_pernyataan_hak_cipta)) {
                unlink('storage/'.$old_file_surat_pernyataan_hak_cipta);
            }

            $fileSuratPernyataan = $request->file('file_surat_pernyataan_hak_cipta')->store('public/file');
            $fileSuratPernyataan = basename($fileSuratPernyataan);
            $cipta->file_surat_pernyataan_hak_cipta = $fileSuratPernyataan ? 'file/' . $fileSuratPernyataan : null;
        }else{
            $fileSuratPernyataan = $cipta->file_surat_pernyataan_hak_cipta;
        }

        if ($request->hasFile('file_surat_pengalihan_hak_cipta')) {
            $old_file_surat_pengalihan_hak_cipta = $cipta->file_surat_pengalihan_hak_cipta;
            if (!empty($old_file_surat_pengalihan_hak_cipta) && is_file('storage/'.$old_file_surat_pengalihan_hak_cipta)) {
                unlink('storage/'.$old_file_surat_pengalihan_hak_cipta);
            }

            $fileSuratPengalihan = $request->file('file_surat_pengalihan_hak_cipta')->store('public/file');
            $fileSuratPengalihan = basename($fileSuratPengalihan);
            $cipta->file_surat_pengalihan_hak_cipta = $fileSuratPengalihan ? 'file/' . $fileSuratPengalihan : null;
        }else{
            $fileSuratPengalihan = $cipta->file_surat_pengalihan_hak_cipta;
        }

        if ($request->hasFile('file_salinan_pks')) {
            $old_file_salinan_pks = $cipta->file_salinan_pks;
            if (!empty($old_file_salinan_pks) && is_file('storage/'.$old_file_salinan_pks)) {
                unlink('storage/'.$old_file_salinan_pks);
            }

            $fileSalinanPKS = $request->file('file_salinan_pks')->store('public/file');
            $fileSalinanPKS = basename($fileSalinanPKS);
            $cipta->file_salinan_pks = $fileSalinanPKS ? 'file/' . $fileSalinanPKS : null;
        }else{
            $fileSalinanPKS = $cipta->file_salinan_pks;
        }


        $cipta->nik = $request->nik;
        $cipta->kkt = $request->kkt;
        $cipta->judul_usulan = $request->judul_usulan;

        $cipta->status = 'sedang diproses';

        if ($cipta->save()) {
            return redirect('/status')->with([
                'notifikasi' => 'Data Berhasil diedit!',
                'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'notifikasi' => 'Data gagal diedit!',
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
