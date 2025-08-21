<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jsas', function (Blueprint $table) {
            $table->id();
            $table->string('kelas');
            $table->string('prodi');
            $table->string('matakuliah');
            $table->string('no_jsa');
            $table->string('nama_pekerjaan');
            $table->string('lokasi_pekerjaan');
            $table->string('tanggal_pelaksanaan');
            $table->string('urutan_kerja');
            $table->string('potensi_bahaya');
            $table->string('upaya_pengendalian');
            $table->string('status')->default('menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jsas');
    }
};
