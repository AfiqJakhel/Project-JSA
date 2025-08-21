<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('work_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jsa_id')->constrained('jsas')->onDelete('cascade');
            $table->integer('step_number');
            $table->text('step_description');
            $table->text('potensi_bahaya');
            $table->text('upaya_pengendalian');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_steps');
    }
};
