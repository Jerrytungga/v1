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
        Schema::create('target_poin_daily', function (Blueprint $table) {
            $table->id();
            $table->integer('semester')->default(0); // Bisa menggunakan integer, default bisa disesuaikan
            $table->integer('bible')->default(0); // Bisa menggunakan integer, misalnya untuk menghitung poin terkait Alkitab
            $table->integer('memorizing_bible')->default(0); // Bisa menyimpan status sebagai integer (misalnya 0 atau 1 untuk tidak atau ya)
            $table->integer('hymns')->default(0); // Menyimpan poin atau jumlah lagu pujian
            $table->boolean('five_times_prayer')->default(false); // Menyimpan status doa lima kali (true/false)
            $table->integer('personal_goals')->default(0); // Menyimpan status atau pencapaian tujuan pribadi
            $table->integer('good_land')->default(0); // Menyimpan status terkait "good land"
            $table->integer('prayer_book')->default(0); // Menyimpan jumlah atau status terkait buku doa
            $table->integer('summary_of_ministry')->default(0); // Menyimpan poin atau status ringkasan pelayanan
            $table->integer('fellowship')->default(0); // Menyimpan jumlah atau status persekutuan
            $table->integer('script_ts_exhibition')->default(0); // Menyimpan status atau nilai terkait pameran skrip
            $table->integer('agenda')->default(0); // Menyimpan poin atau status agenda
            $table->integer('financial')->default(0); // Menyimpan nilai keuangan, menggunakan integer (misalnya dalam satuan sen jika diperlukan)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('target_poin_daily');
    }
};
