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
        Schema::create('salary_generates', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_user');
            $table->date('tanggal_dibuat');
            $table->string('status')->default('Belum Disetujui');
            $table->date('tanggal_disetujui')->nullable();
            $table->string('disetujui_oleh')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_generates');
    }
};
