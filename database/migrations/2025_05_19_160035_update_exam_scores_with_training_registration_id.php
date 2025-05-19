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
         
            $table->unsignedBigInteger('training_registration_id')->after('id');

            
            $table->foreign('training_registration_id')
                ->references('id')
                ->on('training_registrations')
                ->onDelete('cascade');

            // (Opsional) Jika tidak dibutuhkan lagi
            // $table->dropForeign(['user_id']);
            // $table->dropForeign(['training_schedule_id']);
            // $table->dropColumn(['user_id', 'training_schedule_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::table('exam_scores', function (Blueprint $table) {
            $table->dropForeign(['training_registration_id']);
            $table->dropColumn('training_registration_id');

          });
    }
};
