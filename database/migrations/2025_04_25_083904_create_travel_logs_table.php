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
        Schema::create('travel_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_score_id')->constrained('exam_scores')->onDelete('cascade');
            $table->foreignId('schedule_id')->constrained('training_schedules')->onDelete('cascade');
            $table->enum('travel_type', ['return', 'departure']);
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_logs');
    }
};
