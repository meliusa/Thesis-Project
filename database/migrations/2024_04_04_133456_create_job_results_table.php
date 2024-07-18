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
        Schema::create('job_results', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_karyawan');
            $table->unsignedBigInteger('id_jobdesc');
            $table->string('foto');
            $table->text('keterangan');
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            $table->string('tugas_disetujui')->nullable();
            $table->string('pemeriksa')->nullable();
            $table->timestamps();

            $table->foreign('id_karyawan')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('id_jobdesc')->references('id')->on('job_descriptions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_results');
    }
};
