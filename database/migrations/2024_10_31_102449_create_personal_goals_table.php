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
        Schema::create('personal_goals', function (Blueprint $table) {
          
                $table->id();
                $table->string('nip'); // The text of the verse
                $table->string('asisten_id'); // The book name
                $table->string('personalgoals'); // Chapter number
                $table->string('catatan')->nullable();
                $table->text('semester');
                $table->timestamps(); // Created at and updated at
                $table->text('poin')->nullable();
                $table->text('week')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_goals');
    }
};
