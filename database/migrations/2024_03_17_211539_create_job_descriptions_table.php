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
        Schema::create('job_descriptions', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_divisi');
            $table->uuid('id_posisi');
            $table->string('periode_mulai');
            $table->string('periode_selesai');
            $table->timestamps();

            $table->foreign('id_divisi')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('id_posisi')->references('id')->on('job_positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_descriptions');
    }
};
