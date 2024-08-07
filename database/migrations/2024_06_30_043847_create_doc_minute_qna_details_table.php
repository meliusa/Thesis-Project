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
        Schema::create('doc_minute_qna_details', function (Blueprint $table) {
            $table->id();
            $table->uuid('doc_minute_id');
            $table->string('asker');
            $table->string('question');
            $table->string('answer');
            $table->timestamps();

            $table->foreign('doc_minute_id')->references('id')->on('doc_minutes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentation_minute_qna_details');
    }
};
