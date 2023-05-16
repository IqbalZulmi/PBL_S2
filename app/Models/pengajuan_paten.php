<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_paten extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_patens';

    protected $fillable = array (
        'nik', 'kkt', 'judul_usulan', 'file_borang_tindak_lanjut_penelitian', 'file_abstrak_paten', 'file_daftar_isian_pendaftaran', 'file_gambar', 'file_surat_pengalihan_hak_atas_invensi', 'file_scan_surat_kepemilikan', 'file_dokumen_spesifikasi_paten', 'file_klaim_paten', 'usulan', 'file_salinan_pks', 'status', 'tanggal_pengajuan'
    );
}
