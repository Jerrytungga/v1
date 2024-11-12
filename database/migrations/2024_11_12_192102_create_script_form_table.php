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
        Schema::create('script', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->text('nip'); // The text of the verse
            $table->text('asisten_id'); // The book name
            $table->text('semester');
            $table->text('week')->nullable();
            $table->text('catatan')->nullable();
            $table->string('script'); // Chosen script (e.g., Sidang Pemecahan Roti or Exhibition)
            $table->string('Topic'); // Book Title
            $table->text('verse'); // Bible Verse
            $table->text('Truth'); // Truth
            $table->text('Experience'); // Experience
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('script');
    }
};
