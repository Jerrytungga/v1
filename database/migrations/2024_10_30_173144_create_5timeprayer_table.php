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
        Schema::create('5timeprayer', function (Blueprint $table) {
            $table->id();
            $table->string('nip'); // The text of the verse
            $table->string('asisten_id'); // The book name
            $table->string('poin_prayer'); // Chapter number
            $table->string('catatan')->nullable();
            $table->text('week')->nullable();
            $table->text('semester');
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timeprayer');
    }
};
