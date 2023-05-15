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
        Schema::create('pengajuan_hak_ciptas', function (Blueprint $table) {
            $table->id();
            $table->integer('nik');
            $table->String('kkt');
            $table->String('judul_usulan');
            $table->String('file_formulir_permohonan');
            $table->String('file_scan_ktp');
            $table->String('file_scan_npwp');
            $table->String('file_contoh_ciptaan');
            $table->String('file_surat_pernyataan_hak_cipta');
            $table->String('file_surat_pengalihan_hak_cipta');
            $table->String('usulan');
            $table->String('file_salinan_pks');
            $table->enum('status', ['sedang diproses', 'diterima', 'perlu direvisi'])->default('sedang diproses');
            $table->timestamp('tanggal_pengajuan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_hak_ciptas');
    }
};
