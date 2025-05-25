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
           $table->string('identity_card', 255)->after('passport');
           $table->string('diploma', 255)->after('identity_card');
           $table->string('family_register', 255)->after('diploma');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_documents', function (Blueprint $table): void {
        $table->dropColumn(['identity_card', 'diploma', 'family_register']);
        });
    }
};
