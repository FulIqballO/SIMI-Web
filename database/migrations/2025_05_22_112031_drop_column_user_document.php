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
         Schema::table('user_documents', function (Blueprint $table) {
            
            $table->dropColumn('job_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('user_documents', function (Blueprint $table) {
            $table->string('job_order')->nullable();
    });
    
    }
};
