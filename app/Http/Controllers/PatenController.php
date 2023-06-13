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
        $file_scan_surat_kepemilikan = $request->file('file_surat_pengalihan_hak_atas_invensi')->store('public/file');
        $file_scan_surat_kepemilikan = basename($file_scan_surat_kepemilikan);
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
        $pengajuanPaten->file_surat_pengalihan_hak_atas_invensi = $file_scan_surat_kepemilikan ? 'file/' . $file_scan_surat_kepemilikan : null;
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


    public function update(Request $request, string $id)
    {
        $paten = pengajuan_paten::where('id',$id)->firstOrFail();
        $validatedData = $request->validate([
            'nik' => 'required',
            'kkt' => 'required',
            'judul_usulan' => 'required',
            'file_borang_tindak_lanjut_penelitian' => 'nullable|file|mimes:pdf',
            'file_abstrak_paten' => 'nullable|file|mimes:pdf',
            'file_daftar_isian_pendaftaran' => 'nullable|file|mimes:pdf',
            'file_gambar' => 'nullable|file|mimes:pdf',
            'file_surat_pengalihan_hak_atas_invensi' => 'nullable|file|mimes:pdf',
            'file_scan_surat_kepemilikan' => 'nullable|file|mimes:pdf',
            'file_dokumen_spesifikasi_paten' => 'nullable|file|mimes:pdf',
            'file_klaim_paten' => 'nullable|file|mimes:pdf',
            'file_salinan_pks' => 'nullable|file|mimes:pdf',
        ], [
            'nik.required' => 'NIK harus diisi',
            'kkt.required' => 'KKT harus diisi',
            'judul_usulan.required' => 'Judul usulan harus diisi',
            'file_borang_tindak_lanjut_penelitian.mimes' => 'File borang tindak lanjut penelitian harus berformat PDF',
            'file_abstrak_paten.mimes' => 'File abstrak paten harus berformat PDF',
            'file_daftar_isian_pendaftaran.mimes' => 'File daftar isian pendaftaran harus berformat PDF',
            'file_gambar.mimes' => 'File gambar harus berformat PDF',
            'file_surat_pengalihan_hak_atas_invensi.mimes' => 'File surat pengalihan hak atas invensi harus berformat PDF',
            'file_scan_surat_kepemilikan.mimes' => 'File scan surat kepemilikan harus berformat PDF',
            'file_dokumen_spesifikasi_paten.mimes' => 'File dokumen spesifikasi paten harus berformat PDF',
            'file_klaim_paten.mimes' => 'File klaim paten harus berformat PDF',
            'file_salinan_pks.mimes' => 'File salinan PKS harus berformat PDF',
        ]);

        if ($request->hasFile('file_borang_tindak_lanjut_penelitian')) {
            $old_file_borang_tindak_lanjut_penelitian = $paten->file_borang_tindak_lanjut_penelitian;
            if (!empty($old_file_borang_tindak_lanjut_penelitian) && is_file('storage/'.$old_file_borang_tindak_lanjut_penelitian)) {
                unlink('storage/'.$old_file_borang_tindak_lanjut_penelitian);
            }

            $file_borang_tindak_lanjut_penelitian = $request->file('file_borang_tindak_lanjut_penelitian')->store('public/file');
            $file_borang_tindak_lanjut_penelitian = basename($file_borang_tindak_lanjut_penelitian);
            $paten->file_borang_tindak_lanjut_penelitian = $file_borang_tindak_lanjut_penelitian ? 'file/' . $file_borang_tindak_lanjut_penelitian : null;
        }else{
            $file_borang_tindak_lanjut_penelitian = $paten->file_borang_tindak_lanjut_penelitian;
        }

        if ($request->hasFile('file_abstrak_paten')) {
            $old_file_abstrak_paten = $paten->file_abstrak_paten;
            if (!empty($old_file_abstrak_paten) && is_file('storage/'.$old_file_abstrak_paten)) {
                unlink('storage/'.$old_file_abstrak_paten);
            }

            $file_abstrak_paten = $request->file('file_abstrak_paten')->store('public/file');
            $file_abstrak_paten = basename($file_abstrak_paten);
            $paten->file_abstrak_paten = $file_abstrak_paten ? 'file/' . $file_abstrak_paten : null;
        }else{
            $file_abstrak_paten = $paten->file_abstrak_paten;
        }

        if ($request->hasFile('file_daftar_isian_pendaftaran')) {
            $old_file_daftar_isian_pendaftaran = $paten->file_daftar_isian_pendaftaran;
            if (!empty($old_file_daftar_isian_pendaftaran) && is_file('storage/'.$old_file_daftar_isian_pendaftaran)) {
                unlink('storage/'.$old_file_daftar_isian_pendaftaran);
            }

            $file_daftar_isian_pendaftaran = $request->file('file_daftar_isian_pendaftaran')->store('public/file');
            $file_daftar_isian_pendaftaran = basename($file_daftar_isian_pendaftaran);
            $paten->file_daftar_isian_pendaftaran = $file_daftar_isian_pendaftaran ? 'file/' . $file_daftar_isian_pendaftaran : null;
        }else{
            $file_daftar_isian_pendaftaran = $paten->file_daftar_isian_pendaftaran;
        }

        if ($request->hasFile('file_gambar')) {
            $old_file_gambar = $paten->file_gambar;
            if (!empty($old_file_gambar) && is_file('storage/'.$old_file_gambar)) {
                unlink('storage/'.$old_file_gambar);
            }

            $file_gambar = $request->file('file_gambar')->store('public/file');
            $file_gambar = basename($file_gambar);
            $paten->file_gambar = $file_gambar ? 'file/' . $file_gambar : null;
        }else{
            $file_gambar = $paten->file_gambar;
        }

        if ($request->hasFile('file_surat_pengalihan_hak_atas_invensi')) {
            $old_file_surat_pengalihan_hak_atas_invensi = $paten->file_surat_pengalihan_hak_atas_invensi;
            if (!empty($old_file_surat_pengalihan_hak_atas_invensi) && is_file('storage/'.$old_file_surat_pengalihan_hak_atas_invensi)) {
                unlink('storage/'.$old_file_surat_pengalihan_hak_atas_invensi);
            }

            $file_surat_pengalihan_hak_atas_invensi = $request->file('file_surat_pengalihan_hak_atas_invensi')->store('public/file');
            $file_surat_pengalihan_hak_atas_invensi = basename($file_surat_pengalihan_hak_atas_invensi);
            $paten->file_surat_pengalihan_hak_atas_invensi = $file_surat_pengalihan_hak_atas_invensi ? 'file/' . $file_surat_pengalihan_hak_atas_invensi : null;
        }else{
            $file_surat_pengalihan_hak_atas_invensi = $paten->file_surat_pengalihan_hak_atas_invensi;
        }

        if ($request->hasFile('file_scan_surat_kepemilikan')) {
            $old_file_scan_surat_kepemilikan = $paten->file_scan_surat_kepemilikan;
            if (!empty($old_file_scan_surat_kepemilikan) && is_file('storage/'.$old_file_scan_surat_kepemilikan)) {
                unlink('storage/'.$old_file_scan_surat_kepemilikan);
            }

            $file_scan_surat_kepemilikan = $request->file('file_scan_surat_kepemilikan')->store('public/file');
            $file_scan_surat_kepemilikan = basename($file_scan_surat_kepemilikan);
            $paten->file_scan_surat_kepemilikan = $file_scan_surat_kepemilikan ? 'file/' . $file_scan_surat_kepemilikan : null;
        }else{
            $file_scan_surat_kepemilikan = $paten->file_scan_surat_kepemilikan;
        }

        if ($request->hasFile('file_dokumen_spesifikasi_paten')) {
            $old_file_dokumen_spesifikasi_paten = $paten->file_dokumen_spesifikasi_paten;
            if (!empty($old_file_dokumen_spesifikasi_paten) && is_file('storage/'.$old_file_dokumen_spesifikasi_paten)) {
                unlink('storage/'.$old_file_dokumen_spesifikasi_paten);
            }

            $fileDokumenSpesifikasiPaten = $request->file('file_dokumen_spesifikasi_paten')->store('public/file');
            $fileDokumenSpesifikasiPaten = basename($fileDokumenSpesifikasiPaten);
            $paten->file_dokumen_spesifikasi_paten = $fileDokumenSpesifikasiPaten ? 'file/' . $fileDokumenSpesifikasiPaten : null;
        }else{
            $fileDokumenSpesifikasiPaten = $paten->file_dokumen_spesifikasi_paten;
        }

        if ($request->hasFile('file_klaim_paten')) {
            $old_file_klaim_paten = $paten->file_klaim_paten;
            if (!empty($old_file_klaim_paten) && is_file('storage/'.$old_file_klaim_paten)) {
                unlink('storage/'.$old_file_klaim_paten);
            }

            $fileKlaimPaten = $request->file('file_klaim_paten')->store('public/file');
            $fileKlaimPaten = basename($fileKlaimPaten);
            $paten->file_klaim_paten = $fileKlaimPaten ? 'file/' . $fileKlaimPaten : null;
        }else{
            $fileKlaimPaten = $paten->file_klaim_paten;
        }

        if ($request->hasFile('file_salinan_pks')) {
            $old_file_salinan_pks = $paten->file_salinan_pks;
            if (!empty($old_file_salinan_pks) && is_file('storage/'.$old_file_salinan_pks)) {
                unlink('storage/'.$old_file_salinan_pks);
            }

            $fileSalinanPKS = $request->file('file_salinan_pks')->store('public/file');
            $fileSalinanPKS = basename($fileSalinanPKS);
            $paten->file_salinan_pks = $fileSalinanPKS ? 'file/' . $fileSalinanPKS : null;
        }else{
            $fileSalinanPKS = $paten->file_salinan_pks;
        }


        $paten->nik = $request->nik;
        $paten->kkt = $request->kkt;
        $paten->judul_usulan = $request->judul_usulan;

        $paten->status = 'sedang diproses';

        if ($paten->save()) {
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

}
