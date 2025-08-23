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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->integer('semester'); // 1, 2, 3, 4, 6
            $table->integer('kelas'); // 1, 2, 3
            $table->string('nama_matakuliah');
            $table->timestamps();
            
            // Index untuk optimasi query
            $table->index(['semester', 'kelas']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
