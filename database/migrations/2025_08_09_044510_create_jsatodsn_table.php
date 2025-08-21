<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jsatodsn', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jsa')->constrained('jsas')->onDelete('cascade');
            $table->foreignId('id_dsn')->constrained('dosens')->onDelete('cascade');
            $table->string('catatan_dsn')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jsatodsn');
    }
};
