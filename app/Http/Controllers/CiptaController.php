<?php

namespace App\Http\Controllers;

use App\Models\pengajuan_hakCipta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CiptaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            'nik' => 'required|unique:pengajuan_hak_ciptas,nik',
            'kkt' => 'required',
            'judul_usulan' => 'required',
            'file_formulir_permohonan' => 'required|file|mimes:pdf',
            'file_scan_ktp' => 'required|file|mimes:pdf',
            'file_scan_npwp' => 'required|file|mimes:pdf',
            'file_contoh_ciptaan' => 'required|file|mimes:pdf',
            'file_surat_pernyataan_hak_cipta' => 'required|file|mimes:pdf',
            'file_surat_pengalihan_hak_cipta' => 'required|file|mimes:pdf',
            'usulan' => 'required',
            'file_salinan_pks' => 'required|file|mimes:pdf',
        ], [
            'nik.required' => 'nik harus diisi',
            'nik.unique' => 'nik sudah digunakan',
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
            'file_salinan_pks.required' => 'file salinan PKS harus diunggah',
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
