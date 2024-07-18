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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('id_tipe');
            $table->uuid('id_employee');
            $table->uuid('id_user');
            // $table->unsignedBigInteger('id_histori');
            $table->string('nomor_tiket')->unique();
            $table->string('disetujui_oleh')->nullable();
            $table->string('subjek_tiket');
            $table->text('deskripsi');
            $table->string('dokumen_pendukung')->nullable();
            $table->enum('status', ['menunggu', 'diproses', 'ditolak', 'selesai'])->default('menunggu');
            $table->enum('prioritas', ['minor', 'major', 'critical'])->default('minor');
            $table->timestamps();
            
            $table->foreign('id_tipe')->references('id')->on('tipe_tiket');
            $table->foreign('id_employee')->references('id')->on('employees');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('disetujui_oleh')->references('id')->on('users');
            // $table->foreign('id_histori')->references('id')->on('histori_pengaduans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
