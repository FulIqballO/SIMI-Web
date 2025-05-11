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
        Schema::table('training_schedules', function (Blueprint $table) {
            
            $table->integer('duration')->after('time');
            $table->date('start_date')->after('duration');
            $table->date('end_date')->after('start_date');
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_schedules', function (Blueprint $table) {
            $table->dropColumn(['duration', 'start_date', 'end_date']);
        });
    }
};
