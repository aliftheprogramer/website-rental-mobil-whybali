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
        Schema::create('mobils', function (Blueprint $table) {
            $table->string('plat_mobil', 20)->primary(); // Primary key dengan tipe string
            $table->string('brand', 50); // Merek mobil
            $table->string('model', 50); // Model mobil
            $table->year('year'); // Tahun pembuatan
            $table->decimal('price_per_day', 10, 2); // Harga sewa per hari
            $table->enum('status', ['available', 'rented'])->default('available'); // Status ketersediaan mobil
            $table->string('image_url', 255)->nullable(); // URL atau path gambar mobil
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
