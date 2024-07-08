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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key, auto increment
            $table->string('username')->unique(); // Nama pengguna, harus unik
            $table->string('password'); // Password pengguna yang di-hash
            $table->string('phone')->nullable(); // Nomor telepon pengguna, bisa null
            $table->text('address')->nullable(); // Alamat pengguna, bisa null
            $table->enum('role', ['admin', 'customer'])->default('customer'); // Peran pengguna, defaultnya adalah 'customer'
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
