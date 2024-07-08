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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id('feedback_id'); // Primary key, auto increment
            $table->unsignedBigInteger('user_id'); // Foreign key ke tabel Users
            // $table->string('plat_mobil', 20); // Foreign key ke tabel Cars
            // $table->unsignedBigInteger('rental_id'); // Foreign key ke tabel Rentals
            $table->unsignedTinyInteger('rating'); // Rating dari pengguna (1-5)
            $table->text('comment')->nullable(); // Komentar pengguna, bisa null
            $table->timestamps(); // Kolom created_at dan updated_at otomatis

            // Definisikan foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('plat_mobil')->references('plat_mobil')->on('mobils')->onDelete('cascade');
            // $table->foreign('rental_id')->references('rental_id')->on('rentals')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
