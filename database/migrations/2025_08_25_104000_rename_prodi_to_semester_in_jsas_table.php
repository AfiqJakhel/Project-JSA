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
            $table->renameColumn('prodi', 'semester');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jsas', function (Blueprint $table) {
            $table->renameColumn('semester', 'prodi');
        });
    }
};
