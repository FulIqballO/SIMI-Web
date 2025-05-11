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
        Schema::table('trainings', function (Blueprint $table) {
            // Cek jika kolom 'price' belum ada sebelum menambahkannya
            if (!Schema::hasColumn('trainings', 'price')) {
                $table->integer('price')->after('description');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('trainings', function (Blueprint $table) {
            // Cek jika kolom 'price' ada sebelum menghapusnya
            if (Schema::hasColumn('trainings', 'price')) {
                $table->dropColumn('price');
            }
        });
    }
};
