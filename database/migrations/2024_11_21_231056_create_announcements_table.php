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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('batch'); // Batch as string, assuming it's a name or identifier
            $table->text('announcement')->nullable(); // Announcement content, should be text
            $table->date('date_mulai')->nullable(); // Start date, use date type
            $table->time('jam_mulai')->nullable(); // Start time, use time type
            $table->date('date_akhir')->nullable(); // End date, use date type
            $table->time('jam_akhir')->nullable(); // End time, use time type
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
