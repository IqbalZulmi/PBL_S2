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
            $table->String('id_user');
            $table->String('kkt');
            $table->String('judul_usulan');
            $table->String('formulir');
            $table->String('scan_ktp');
            $table->String('scan_npwp');
            $table->String('contoh_ciptaan');
            $table->String('surat_pernyataan');
            $table->String('surat_pengalihan');
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
        Schema::dropIfExists('pengajuan_hak_ciptas');
    }
};
