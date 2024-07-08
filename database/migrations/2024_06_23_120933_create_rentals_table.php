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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id('rental_id'); // Primary key, auto increment
            $table->unsignedBigInteger('user_id'); // Foreign key ke tabel Users
            $table->string('plat_mobil', 20); // Foreign key ke tabel Cars
            $table->date('rental_date'); // Tanggal mulai rental
            $table->date('return_date'); // Tanggal pengembalian
            $table->decimal('total_price', 10, 2); // Total harga sewa
            $table->enum('status', ['ongoing', 'completed', 'cancelled'])->default('ongoing'); // Status rental
            $table->timestamps(); // Kolom created_at dan updated_at otomatis

            // Definisikan foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('plat_mobil')->references('plat_mobil')->on('mobils')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
