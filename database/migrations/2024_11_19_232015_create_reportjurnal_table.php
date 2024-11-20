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
        Schema::create('reportjurnal', function (Blueprint $table) {
            $table->id();
            $table->string('nip'); 
            $table->string('asisten_id'); 
            $table->text('semester');
            $table->text('week'); // Week
            $table->integer('bible'); // Bible
            $table->integer('memorizing'); // Memorizing
            $table->integer('hymns'); // Hymns
            $table->integer('prayer_5_time'); // Prayer 5 Time
            $table->integer('tp'); // TP (misalnya, "Total Prayer" atau "Target Points")
            $table->integer('doa'); // Doa (Prayer notes or related)
            $table->integer('p_goals'); // P.Goals (Personal Goals)
            $table->integer('ministry'); // Ministry
            $table->integer('fellowship'); // Fellowship
            $table->integer('ts'); // Ts (perhaps "Time Spent" or "Testimony Status")
            $table->text('status'); // Status (Completed, Pending, etc.)
            $table->timestamps(); // Created at & Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportjurnal');
    }
};
