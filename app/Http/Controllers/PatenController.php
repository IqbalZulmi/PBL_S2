<?php

namespace App\Http\Controllers;

use App\Models\pengajuan_paten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatenController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('user.paten', [
            'user' => $user
        ]);
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nik' => 'required',
        'kkt' => 'required',
        'judul_usulan' => 'required',
        'file_borang_tindak_lanjut_penelitian' => 'required|file|mimes:pdf',
        'file_abstrak_paten' => 'required|file|mimes:pdf',
        'file_daftar_isian_pendaftaran' => 'required|file|mimes:pdf',
        'file_gambar' => 'required|file|mimes:pdf',
        'file_surat_pengalihan_hak_atas_invensi' => 'required|file|mimes:pdf',
        'file_scan_surat_kepemilikan' => 'required|file|mimes:pdf',
        'file_dokumen_spesifikasi_paten' => 'required|file|mimes:pdf',
        'file_klaim_paten' => 'required|file|mimes:pdf',
        'usulan' => 'required',
        'file_salinan_pks' => 'file|mimes:pdf',
    ], [
        'nik.required' => 'NIK harus diisi',
        'kkt.required' => 'KKT harus diisi',
        'judul_usulan.required' => 'Judul usulan harus diisi',
        'file_borang_tindak_lanjut_penelitian.required' => 'File borang tindak lanjut penelitian harus diunggah',
        'file_borang_tindak_lanjut_penelitian.mimes' => 'File borang tindak lanjut penelitian harus berformat PDF',
        'file_abstrak_paten.required' => 'File abstrak paten harus diunggah',
        'file_abstrak_paten.mimes' => 'File abstrak paten harus berformat PDF',
        'file_daftar_isian_pendaftaran.required' => 'File daftar isian pendaftaran harus diunggah',
        'file_daftar_isian_pendaftaran.mimes' => 'File daftar isian pendaftaran harus berformat PDF',
        'file_gambar.required' => 'File gambar harus diunggah',
        'file_gambar.mimes' => 'File gambar harus berformat PDF',
        'file_surat_pengalihan_hak_atas_invensi.required' => 'File surat pengalihan hak atas invensi harus diunggah',
        'file_surat_pengalihan_hak_atas_invensi.mimes' => 'File surat pengalihan hak atas invensi harus berformat PDF',
        'file_scan_surat_kepemilikan.required' => 'File scan surat kepemilikan harus diunggah',
        'file_scan_surat_kepemilikan.mimes' => 'File scan surat kepemilikan harus berformat PDF',
        'file_dokumen_spesifikasi_paten.required' => 'File dokumen spesifikasi paten harus diunggah',
        'file_dokumen_spesifikasi_paten.mimes' => 'File dokumen spesifikasi paten harus berformat PDF',
        'file_klaim_paten.required' => 'File klaim paten harus diunggah',
        'file_klaim_paten.mimes' => 'File klaim paten harus berformat PDF',
        'usulan.required' => 'Usulan harus diisi',
        'file_salinan_pks.mimes' => 'File salinan PKS harus berformat PDF',
    ]);

    $fileBorangTindakLanjut = $request->file('file_borang_tindak_lanjut_penelitian')->store('public/file');
    $fileBorangTindakLanjut = basename($fileBorangTindakLanjut);
    $fileAbstrakPaten = $request->file('file_abstrak_paten')->store('public/file');
    $fileAbstrakPaten = basename($fileAbstrakPaten);
    $fileDaftarIsianPendaftaran = $request->file('file_daftar_isian_pendaftaran')->store('public/file');
    $fileDaftarIsianPendaftaran = basename($fileDaftarIsianPendaftaran);
    $fileGambar = $request->file('file_gambar')->store('public/file');
    $fileGambar = basename($fileGambar);
    $fileSuratPengalihan = $request->file('file_surat_pengalihan_hak_atas_invensi')->store('public/file');
    $fileSuratPengalihan = basename($fileSuratPengalihan);
    $fileScanKepemilikan = $request->file('file_scan_surat_kepemilikan')->store('public/file');
    $fileScanKepemilikan = basename($fileScanKepemilikan);
    $fileDokumenSpesifikasi = $request->file('file_dokumen_spesifikasi_paten')->store('public/file');
    $fileDokumenSpesifikasi = basename($fileDokumenSpesifikasi);
    $fileKlaimPaten = $request->file('file_klaim_paten')->store('public/file');
    $fileKlaimPaten = basename($fileKlaimPaten);
    if ($request->hasFile('file_salinan_pks')) {
        $fileSalinanPKS = $request->file('file_salinan_pks')->store('public/file');
        $fileSalinanPKS = basename($fileSalinanPKS);
    } else {
        $fileSalinanPKS = null;
    }

    $pengajuanPaten = new pengajuan_paten();
    $pengajuanPaten->nik = $request->nik;
    $pengajuanPaten->kkt = $request->kkt;
    $pengajuanPaten->judul_usulan = $request->judul_usulan;
    $pengajuanPaten->usulan = $request->usulan;

    $pengajuanPaten->file_borang_tindak_lanjut_penelitian = $fileBorangTindakLanjut ? 'file/' . $fileBorangTindakLanjut : null;
    $pengajuanPaten->file_abstrak_paten = $fileAbstrakPaten ? 'file/' . $fileAbstrakPaten : null;
    $pengajuanPaten->file_daftar_isian_pendaftaran = $fileDaftarIsianPendaftaran ? 'file/' . $fileDaftarIsianPendaftaran : null;
    $pengajuanPaten->file_gambar = $fileGambar ? 'file/' . $fileGambar : null;
    $pengajuanPaten->file_surat_pengalihan_hak_atas_invensi = $fileSuratPengalihan ? 'file/' . $fileSuratPengalihan : null;
    $pengajuanPaten->file_scan_surat_kepemilikan = $fileScanKepemilikan ? 'file/' . $fileScanKepemilikan : null;
    $pengajuanPaten->file_dokumen_spesifikasi_paten = $fileDokumenSpesifikasi ? 'file/' . $fileDokumenSpesifikasi : null;
    $pengajuanPaten->file_klaim_paten = $fileKlaimPaten ? 'file/' . $fileKlaimPaten : null;
    if($request->usulan == 'Tidak'){
        $pengajuanPaten->file_salinan_pks = null;
    }else{
        $pengajuanPaten->file_salinan_pks = $fileSalinanPKS ? 'file/' . $fileSalinanPKS : null;
    }

    if ($pengajuanPaten->save()) {
        return redirect('/status')->with([
            'notifikasi' => 'Berhasil mengirim pengajuan!',
            'type' => 'success'
        ]);
    } else {
        return redirect()->back()->with([
            'notifikasi' => 'Gagal mengirim pengajuan',
            'type' => 'error'
        ]);
    }
}


}
