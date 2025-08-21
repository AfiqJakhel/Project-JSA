<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('apd', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jsa')->constrained('jsas')->onDelete('cascade');
            $table->foreignId('id_mhs')->constrained('mahasiswas')->onDelete('cascade');
            $table->string('apd_shelmet')->nullable();
            $table->string('apd_sgloves')->nullable();
            $table->string('apd_shoes')->nullable();
            $table->string('apd_sglasses')->nullable();
            $table->string('apd_svest')->nullable();
            $table->string('apd_earplug')->nullable();
            $table->string('apd_fmask')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('apd');
    }
};
