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
        Schema::table('jsas', function (Blueprint $table) {
            // Menambahkan unique constraint pada kolom no_jsa
            $table->unique('no_jsa', 'jsas_no_jsa_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jsas', function (Blueprint $table) {
            // Menghapus unique constraint
            $table->dropUnique('jsas_no_jsa_unique');
        });
    }
};
