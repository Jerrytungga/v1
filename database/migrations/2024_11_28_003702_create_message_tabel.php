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
        Schema::create('Asisten_message', function (Blueprint $table) {
            $table->id();
            $table->text('nip'); // The text of the verse
            $table->text('asisten_id'); // The book name
            $table->text('semester');
            $table->text('week')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive'); 
            $table->text('pesan')->nullable(); // Enum untuk status
            $table->timestamps();  // Kolom untuk created_at dan updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Asisten_message');
    }
};
