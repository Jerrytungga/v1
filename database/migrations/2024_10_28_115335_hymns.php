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
        //
        Schema::create('Hymns', function (Blueprint $table) {
            $table->id();
            $table->string('nip'); // The text of the verse
            $table->string('asisten_id'); // The book name
            $table->string('no_Hymns'); // Chapter number
            $table->string('stanza'); // Specific verse number
            $table->string('frase'); // Specific verse number
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
