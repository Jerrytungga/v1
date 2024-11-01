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
        Schema::table('good_land', function (Blueprint $table) {
            $table->time('experience_1_time')->nullable();
            $table->time('experience_2_time')->nullable();
            $table->time('experience_3_time')->nullable();
            $table->time('experience_4_time')->nullable();
            $table->time('experience_5_time')->nullable();
            $table->time('experience_6_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('good_land', function (Blueprint $table) {
            //
        });
    }
};
