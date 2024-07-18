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
        Schema::create('employment_histories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_karyawan');
            $table->string('nama_perusahaan');
            $table->string('posisi');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->timestamps();

            $table->foreign('id_karyawan')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employment_histories');
    }
};
