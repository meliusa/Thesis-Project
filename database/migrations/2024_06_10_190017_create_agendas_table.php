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
        Schema::create('agendas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('topic_id');
            $table->date('date');
            $table->time('time');
            $table->enum('meeting_type', ['Daring', 'Tatap Muka']);
            $table->string('meeting_address',255);
            $table->enum('status', ['Menunggu Persetujuan', 'Diterima', 'Ditolak', 'Dijadwalkan', 'Selesai','Notula Tersedia']);
            $table->text('rejection_reason')->nullable();
            $table->timestamp('distributed_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('reported_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
