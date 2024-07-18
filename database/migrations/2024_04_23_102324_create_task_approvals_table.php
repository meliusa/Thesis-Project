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
        Schema::create('task_approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_task');
            $table->unsignedBigInteger('id_jobresult');
            $table->timestamps();

            $table->foreign('id_task')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('id_jobresult')->references('id')->on('job_results')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_approvals');
    }
};
