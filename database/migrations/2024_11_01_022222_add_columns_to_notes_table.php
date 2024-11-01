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
        // Menggunakan Schema::create untuk membuat tabel baru
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Kolom title
            $table->text('content'); // Kolom content
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade'); // Kolom category_id sebagai foreign key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes'); // Menghapus tabel notes saat rollback
    }

};
