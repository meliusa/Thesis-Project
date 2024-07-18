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
        Schema::create('submission_modules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id'); 
            $table->string('title'); 
            $table->string('purpose'); 
            $table->text('agenda'); 
            $table->date('date'); 
            $table->time('time');
            $table->text('duration');
            $table->enum('type', ['Daring', 'Tatap Muka']);
            $table->string('location'); 
            $table->text('supporting_document'); 
            $table->string('postscript'); 
            $table->enum('status', ['Baru Ditambahkan','Proses Persetujuan', 'Sudah Disetujui', 'Undangan Didistribusikan', 'Telah Dilaksanakan', 'Dibatalkan' , 'Notula Tersedia']);
            $table->string('reason_cancelled')->nullable(); 
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('distributed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('implemented_at')->nullable();
            $table->timestamp('provided_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submission_modules');
    }
};
