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
            $table->dropColumn(['potensi_bahaya', 'upaya_pengendalian']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jsas', function (Blueprint $table) {
            $table->text('potensi_bahaya')->nullable();
            $table->text('upaya_pengendalian')->nullable();
        });
    }
};
