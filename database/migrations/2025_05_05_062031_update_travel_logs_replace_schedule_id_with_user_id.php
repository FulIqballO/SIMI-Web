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
        Schema::table('travel_logs', function (Blueprint $table) {
            $table->dropForeign(['schedule_id']);
            $table->dropColumn('schedule_id');

            $table->unsignedBigInteger('user_id')->after('exam_score_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel_logs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->unsignedBigInteger('schedule_id')->after('exam_score_id');
            $table->foreign('schedule_id')->references('id')->on('training_schedules')->onDelete('cascade');
        });
    }
};
