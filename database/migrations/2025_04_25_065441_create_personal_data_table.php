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
        Schema::create('personal_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('id_card_number');
            $table->string('citizen_id');
            $table->string('passport_number')->nullable();
            $table->string('family_card_number');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('diploma_number');
            $table->date('pre_medical_checkup')->nullable();
            $table->date('full_medical_checkup')->nullable();
            $table->date('regisration_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_data');
    }
};
