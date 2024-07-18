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
        Schema::create('family_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_keluarga');
            $table->string('nama_lengkap');
            $table->string('nik', 16)->unique();
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('pendidikan');
            $table->uuid('id_pekerjaan');
            $table->string('status_pernikahan');
            $table->string('hubungan_keluarga');
            $table->string('kewarganegaraan');
            $table->string('no_passport')->unique()->nullable();
            $table->string('no_kitas')->unique()->nullable();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->timestamps();

            $table->foreign('id_keluarga')->references('id')->on('families')->onDelete('cascade');
            $table->foreign('id_pekerjaan')->references('id')->on('job_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_details');
    }
};
