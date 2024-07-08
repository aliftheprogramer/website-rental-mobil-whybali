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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('payment_id'); // Primary key, auto increment
            $table->unsignedBigInteger('rental_id'); // Foreign key ke tabel Rentals
            $table->decimal('amount', 10, 2); // Jumlah pembayaran
            $table->date('payment_date'); // Tanggal pembayaran
            $table->string('payment_method', 50); // Metode pembayaran
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending'); // Status pembayaran
            $table->timestamps(); // Kolom created_at dan updated_at otomatis

            // Definisikan foreign key
            $table->foreign('rental_id')->references('rental_id')->on('rentals')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
