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
        Schema::create('salary_advances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_gaji');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('kategori');
            $table->string('keterangan');
            $table->double('jumlah');
            $table->double('total_gaji');
            $table->timestamps();

            $table->foreign('id_gaji')->references('id')->on('employee_salaries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_advances');
    }
};