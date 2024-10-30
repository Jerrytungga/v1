<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trainee', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nip');
            $table->string('asisten_id');
            $table->string('batch');
            $table->string('status');
            $table->string('semester');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainee');
    }
};
