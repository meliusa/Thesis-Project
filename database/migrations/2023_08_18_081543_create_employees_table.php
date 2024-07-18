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
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_user');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->uuid('id_divisi');
            $table->uuid('id_posisi');
            $table->string('no_hp', 13);
            $table->string('alamat_ktp');
            $table->string('tempat_tinggal');
            $table->string('agama');
            $table->string('jenis_kelamin');
            $table->string('status_pernikahan');
            $table->string('golongan_darah');
            $table->string('kewarganegaraan');
            $table->string('nik', 16)->unique();
            $table->string('foto_ktp')->nullable(); // Untuk menyimpan nama file
            $table->uuid('id_pekerjaan');
            $table->string('bank');
            $table->string('nomor_rekening');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_posisi')->references('id')->on('job_positions')->onDelete('cascade');
            $table->foreign('id_pekerjaan')->references('id')->on('job_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
