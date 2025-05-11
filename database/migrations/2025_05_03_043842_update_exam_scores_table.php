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
        Schema::table('exam_scores', function (Blueprint $table) {
            // Hapus foreign dan kolom
            if (Schema::hasColumn('exam_scores', 'training_schedule_id')) {
                $table->dropForeign(['training_schedule_id']);
                $table->dropColumn('training_schedule_id');
            }
        });

        Schema::table('exam_scores', function (Blueprint $table) {
            $table->foreignId('training_schedule_id')
                  ->after('id')
                  ->constrained('training_schedules')
                  ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_scores', function (Blueprint $table) {
            $table->dropForeign(['training_schedule_id']);
            $table->dropColumn('training_schedule_id');

            $table->string('subject')->nullable();
        });
    }
};
