<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_patens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik');
            $table->foreign('nik')->references('nik')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->String('kkt');
            $table->String('judul_usulan');
            $table->String('file_borang_tindak_lanjut_penelitian');
            $table->String('file_abstrak_paten');
            $table->String('file_daftar_isian_pendaftaran');
            $table->String('file_gambar');
            $table->String('file_surat_pengalihan_hak_atas_invensi');
            $table->String('file_scan_surat_kepemilikan');
            $table->String('file_dokumen_spesifikasi_paten');
            $table->String('file_klaim_paten');
            $table->String('usulan');
            $table->String('file_salinan_pks')->nullable();
            $table->enum('status', ['sedang diproses', 'diterima', 'perlu direvisi'])->default('sedang diproses');
            $table->text('alasan')->nullable();
            $table->timestamp('tanggal_pengajuan')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_patens');
    }
};
