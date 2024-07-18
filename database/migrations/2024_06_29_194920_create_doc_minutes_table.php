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
        Schema::create('doc_minutes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('agenda_id');
            $table->uuid('user_id');
            $table->text('events');
            $table->text('decisions');
            $table->enum('status', ['Baru Ditambahkan', 'Telah Didistribusikan']);
            $table->timestamps();

            $table->foreign('agenda_id')->references('id')->on('submission_modules')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_minutes');
    }
};
