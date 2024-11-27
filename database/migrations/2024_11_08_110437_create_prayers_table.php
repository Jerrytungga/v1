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
        Schema::create('prayers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->text('nip'); // The text of the verse
            $table->text('asisten_id'); // The book name
            $table->text('semester');
            $table->text('week')->nullable();
            $table->text('catatan')->nullable();
            $table->text('topic');
            $table->string('poin_topic')->nullable();
            $table->date('prayer_date');
            $table->text('light'); // 'Terang' column
            $table->string('light_poin')->nullable();
            $table->text('appreciation'); // 'Apresiasi' column
            $table->string('appreciation_poin')->nullable();
            $table->text('action'); // 'Tindakan' column
            $table->string('action_poin')->nullable();
            $table->date('prayer_answered_date')->nullable(); // 'Tanggal Doa dijawab' column (nullable)
            $table->text('prayer_answer')->nullable(); // 'Jawaban Doa' column (nullable)
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prayers');
    }
};
