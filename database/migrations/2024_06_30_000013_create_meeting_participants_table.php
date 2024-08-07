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
        Schema::create('meeting_participants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('agenda_id');
            $table->uuid('participant_id');
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('initial_absen_at')->nullable();
            $table->timestamp('final_absen_at')->nullable();
            $table->string('not_attending_reason')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('agenda_id')->references('id')->on('submission_modules')->onDelete('cascade');
            $table->foreign('participant_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_participants');
    }
};
