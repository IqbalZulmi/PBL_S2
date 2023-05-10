<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_paten extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_patens';

    protected $fillable = array (
        'id_user', 'kkt', 'judul_usulan', 'borang', 'abstrak_paten', 'daftar_isian_pendaftaran', 'gambar', 'surat_pengalihan', 'scan_surat', 'dokumen', 'klaim_paten', 'usulan', 'salinan_pks', 'status', 'tanggal_pengajuan'
    );
}
