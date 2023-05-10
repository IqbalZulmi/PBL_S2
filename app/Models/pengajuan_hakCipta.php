<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_hakCipta extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_hakCiptas';

    protected $fillable = array (
        'id_user', 'kkt', 'judul_usulan', 'formulir', 'scan_ktp', 'scan_npwp', 'contoh_ciptaan', 'surat_pernyataan', 'surat_pengalihan', 'usulan', 'salinan_pks', 'status', 'tanggal_pengajuan'
    );
}
