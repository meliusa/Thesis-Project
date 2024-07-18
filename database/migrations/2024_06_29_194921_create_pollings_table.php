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
        Schema::create('pollings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('agenda_id');
            $table->string('question');
            $table->enum('status', ['Baru Ditambahkan', 'Proses', 'Selesai']);
            $table->timestamps();

            $table->foreign('agenda_id')->references('id')->on('submission_modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pollings');
    }
};
