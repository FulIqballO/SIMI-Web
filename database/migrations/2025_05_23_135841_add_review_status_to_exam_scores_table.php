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
               Schema::table('exam_scores', function (Blueprint $table) {
              $table->enum('review_status', ['pending', 'approved', 'rejected'])->default('pending')->after('remarks');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_scores', function (Blueprint $table) {
             Schema::table('exam_scores', function (Blueprint $table) {
                $table->dropColumn('review_status');
            });
        });
    }
};
