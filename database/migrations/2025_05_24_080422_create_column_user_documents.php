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
        Schema::table('user_documents', function (Blueprint $table): void {
           $table->string('marriage_certificate', 255)->after('police_clearance');
           $table->string('passport', 255)->after('marriage_certificate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_documents', function (Blueprint $table) {
             $table->dropColumn(['marriage_certificate', 'passport']);
        });
    }
};
