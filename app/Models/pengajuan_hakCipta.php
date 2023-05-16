<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_hakCipta extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_hakCiptas';

    protected $fillable = array (
        'nik', 'kkt', 'judul_usulan', 'file_formulir_permohonan', 'file_scan_ktp', 'file_scan_npwp', 'file_contoh_ciptaan', 'file_surat_pernyataan_hak_cipta', 'file_surat_pengalihan_hak_cipta', 'usulan', 'file_salinan_pks', 'status', 'tanggal_pengajuan'
    );
}
