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
            $table->String('id_user');
            $table->String('kkt');
            $table->String('judul_usulan');
            $table->String('borang');
            $table->String('abstrak_paten');
            $table->String('daftar_isian_pendaftaran');
            $table->String('gambar');
            $table->String('surat_pengalihan');
            $table->String('scan_surat');
            $table->String('dokumen');
            $table->String('klaim_paten');
            $table->String('usulan');
            $table->String('salinan_pks');
            $table->enum('status', ['menunggu', 'diterima', 'ditolak']);
            $table->timestamps();
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
