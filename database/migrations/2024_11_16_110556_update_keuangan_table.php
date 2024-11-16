<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('keuangan', function (Blueprint $table) {
            // Contoh perubahan
            $table->decimal('debit', 15, 2)->change();
            $table->decimal('credit', 15, 2)->change();
            $table->decimal('saldo', 15, 2)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('keuangan', function (Blueprint $table) {
            // Pastikan rollback jika diperlukan
            $table->text('debit')->change();
            $table->text('credit')->change();
            $table->text('saldo')->nullable(false)->change();
        });
    }
    
};
