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
            $table->string('nip');  // NIP (Nomor Induk Pegawai) sebagai string
            $table->string('asisten_id');  // ID Asisten sebagai string
            $table->text('semester');  // Semester sebagai text (jika ada format panjang)
            $table->string('week');  // Week sebagai string (lebih fleksibel jika minggu bisa berupa teks)
            $table->string('catatan')->nullable();
            $table->integer('batch')->default(0);  // Poin Bible
            
            // Kolom-kolom poin sebagai integer
            $table->integer('bible')->default(0);  // Poin Bible
            $table->integer('memorizing')->default(0);  // Poin Memorizing
            $table->integer('hymns')->default(0);  // Poin Hymns
            $table->integer('prayer_5_time')->default(0);  // Poin Prayer 5 Time
            $table->integer('tp')->default(0);  // Poin Total Prayer / Target Points
            $table->integer('doa')->default(0);  // Poin Doa
            $table->integer('p_goals')->default(0);  // Poin Personal Goals
            $table->integer('ministry')->default(0);  // Poin Ministry
            $table->integer('fellowship')->default(0);  // Poin Fellowship
            $table->integer('ts')->default(0);  // Poin Time Spent / Testimony Status
            $table->integer('agenda')->default(0);  // Poin Agenda
            $table->integer('finance')->default(0);  // Poin Finance
            
            // Kolom total achievement dan standard points
            $table->integer('achievement')->default(0);  // Poin Achievement
            $table->integer('standart_poin')->default(0);  // Poin Standar Poin
            
            $table->string('status')->default('Pending');  // Status sebagai string dengan nilai default
            
            // Timestamps
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
