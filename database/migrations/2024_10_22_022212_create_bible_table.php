<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bible', function (Blueprint $table) {
            $table->id();
            $table->string('asisten_id');
            $table->string('nip');
            $table->string('pl_pb');
            $table->string('poin')->nullable();
            $table->string('book');
            $table->integer('verse');
            $table->text('phrase_light');
            $table->text('semester');
            $table->text('week')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bible');
    }
};
