<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jsa_id')->constrained('jsas')->onDelete('cascade');
            $table->string('area_inspeksi');
            $table->string('item_inspeksi');
            $table->text('standar_kebersihan');
            $table->text('hasil_pemeriksaan');
            $table->string('status');
            $table->enum('ok_ng', ['OK', 'NG']);
            $table->text('tindakan_korektif');
            $table->date('tanggal_selesai');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};
