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
        Schema::create('good_land', function (Blueprint $table) {
            $table->id();
            $table->string('nip'); // The text of the verse
            $table->string('asisten_id'); // The book name
            $table->text('semester');
            $table->text('verses');
            $table->text('da')->nullable();
            $table->text('dt')->nullable();
            $table->text('ds')->nullable();
            $table->text('experience_1')->nullable();
            $table->text('experience_2')->nullable();
            $table->text('experience_3')->nullable();
            $table->text('experience_4')->nullable();
            $table->text('experience_5')->nullable();
            $table->text('experience_6')->nullable();
            $table->text('week')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('good_land');
    }
};
