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
        Schema::create('task_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained();
            $table->string('questions');
            $table->string('answers');
            // Add any other fields you need for task details
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_details');
    }
};
