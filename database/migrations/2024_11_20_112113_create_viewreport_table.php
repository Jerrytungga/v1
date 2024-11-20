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
        Schema::create('viewreport', function (Blueprint $table) {
            $table->id();
            $table->string('setting_name');  // Nama pengaturan (misalnya "auto_input_day")
            $table->integer('day_of_week');  // Hari dalam seminggu (1 = Senin, 7 = Minggu)
            $table->time('input_time');     // Waktu input otomatis (format HH:MM)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viewreport');
    }
};
