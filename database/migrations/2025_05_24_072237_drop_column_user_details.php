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
       
      Schema::table('user_details', function (Blueprint $table) {
          $table->dropColumn('marriage_certificate');
          $table->dropColumn('passport');
        });
         
      
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::table('user_details', function (Blueprint $table) {
             $table->string('marriage_certificate', 255);
               $table->string('passport', 255);
        });
    }
};
