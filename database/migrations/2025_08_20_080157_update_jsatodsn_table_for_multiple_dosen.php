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
        // Hapus unique constraint yang mungkin ada untuk mendukung multiple dosen
        Schema::table('jsatodsn', function (Blueprint $table) {
            // Drop unique constraint jika ada
            if (Schema::hasIndex('jsatodsn', 'jsatodsn_id_jsa_id_dsn_unique')) {
                $table->dropUnique(['id_jsa', 'id_dsn']);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jsatodsn', function (Blueprint $table) {
            // Tambahkan kembali unique constraint jika diperlukan
            $table->unique(['id_jsa', 'id_dsn'], 'jsatodsn_id_jsa_id_dsn_unique');
        });
    }
};
