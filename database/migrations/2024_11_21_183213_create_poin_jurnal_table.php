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
        Schema::create('poin_jurnal', function (Blueprint $table) {
            $table->id();
            $table->string('semester');  // Semester of the report
            $table->integer('bible')->nullable();  // Bible study progress (integer type)
            $table->integer('memorizing_bible')->nullable();  // Bible memorizing progress
            $table->integer('hymns')->nullable();  // Hymn progress
            $table->integer('five_times_prayer')->nullable();  // 5 times prayer progress
            $table->integer('personal_goals')->nullable();  // Personal goals
            $table->integer('good_land')->nullable();  // Good Land progress
            $table->integer('prayer_book')->nullable();  // Prayer book progress
            $table->integer('summary_of_ministry')->nullable();  // Summary of ministry
            $table->integer('fellowship')->nullable();  // Fellowship progress
            $table->integer('script_ts_exhibition')->nullable();  // Script TS & Exhibition progress
            $table->integer('agenda')->nullable();  // Agenda progress
            $table->integer('finance')->nullable();  // Agenda progress
            $table->integer('total')->nullable();  // Total of all the above
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poin_jurnal');
    }
};
