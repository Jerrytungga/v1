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
        Schema::create('ministries', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->text('nip'); // The text of the verse
            $table->text('asisten_id'); // The book name
            $table->text('semester');
            $table->text('week')->nullable();
            $table->text('catatan')->nullable();
            $table->text('poin')->nullable();
            $table->text('book_title');
            $table->text('news');
            $table->text('inspirasi');
            $table->enum('category', ['Pembinaan Dasar', 'Pelajaran Hayat'])->default('Pembinaan Dasar');  // Enum untuk status
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ministries');
    }
};
