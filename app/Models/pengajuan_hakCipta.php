<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_hakCipta extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_hak_ciptas';
    public $timestamps = false;

    protected $fillable = array (
        'nik', 'kkt', 'judul_usulan', 'file_formulir_permohonan', 'file_scan_ktp', 'file_scan_npwp', 'file_contoh_ciptaan', 'file_surat_pernyataan_hak_cipta', 'file_surat_pengalihan_hak_cipta', 'usulan', 'file_salinan_pks', 'status', 'alasan', 'tanggal_pengajuan'
    );

    protected static function boot()
    {
        parent::boot();

        // Event 'creating' akan dipanggil sebelum model disimpan ke database
        static::creating(function ($model) {
            // Set nilai tanggal_pengajuan menjadi tanggal saat ini
            $model->tanggal_pengajuan = now();
        });
    }
}
