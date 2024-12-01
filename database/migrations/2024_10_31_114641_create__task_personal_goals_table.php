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
        Schema::create('task_personal_goals', function (Blueprint $table) {
            $table->id();
            $table->string('nip'); // The text of the verse
            $table->string('asisten_id'); // The book name
            $table->text('semester');
            $table->text('week')->nullable();
            $table->string('Assignment')->nullable();
            $table->string('status')->nullable();
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_personal_goals');
    }
};
