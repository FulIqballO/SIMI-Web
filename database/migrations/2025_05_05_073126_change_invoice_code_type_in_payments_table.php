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
        Schema::table('payments', function (Blueprint $table) {
               // Tambahkan kolom id sebagai primary key jika belum ada
               $table->id()->first();

              
               $table->dropForeign(['user_id']);
               $table->dropForeign(['training_id']);
               $table->dropColumn(['user_id', 'training_id']);
   
               // Tambahkan kolom training_registration_id dan relasinya
               $table->unsignedBigInteger('training_registration_id')->after('id');
               $table->foreign('training_registration_id')->references('id')->on('training_registrations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Balikkan perubahan
            $table->dropForeign(['training_registration_id']);
            $table->dropColumn('training_registration_id');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('training_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('training_id')->references('id')->on('trainings');

            $table->dropColumn('id'); // drop 'id' jika sebelumnya ditambahkan
        });
    }
};
