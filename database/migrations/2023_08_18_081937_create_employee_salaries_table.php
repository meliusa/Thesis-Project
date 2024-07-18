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
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_karyawan');
            $table->string('nik_karyawan');
            $table->double('gaji_pokok');
            $table->double('asuransi');
            $table->double('PPH21');
            $table->double('gaji_bersih');
            $table->timestamps();

            $table->foreign('id_karyawan')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_salaries');
    }
};
