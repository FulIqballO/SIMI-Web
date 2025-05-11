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
        Schema::create('payments', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('training_id')->constrained('trainings')->onDelete('cascade');
            $table->foreignId('personal_data_id')->constrained('personal_data')->onDelete('cascade');
            $table->integer('invoice_code');
            $table->date('transfer_date');
            $table->time('transfer_time');
            $table->string('proof_of_transfer')->nullable();
            $table->enum('payment_status', ['Paid', 'Unpaid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
