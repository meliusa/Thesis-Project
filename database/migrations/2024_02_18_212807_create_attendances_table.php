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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_karyawan');
            $table->string('periode');
            $table->string('tanggal');
            $table->string('jam_masuk');
            $table->string('jam_pulang');
            $table->string('status');
            $table->string('keterangan')->nullable();
            $table->string('surat_izin')->nullable();
            $table->timestamps();

            $table->foreign('id_karyawan')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
