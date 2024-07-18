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
        Schema::create('families', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_karyawan');
            $table->string('no_kk', 16)->unique();
            $table->string('kepala_keluarga');
            $table->string('alamat');
            $table->string('rt/rw');
            $table->string('desa/kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten/kota');
            $table->string('kode_pos');
            $table->string('provinsi');
            $table->string('foto_kk')->nullable();
            $table->timestamps();

            $table->foreign('id_karyawan')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
