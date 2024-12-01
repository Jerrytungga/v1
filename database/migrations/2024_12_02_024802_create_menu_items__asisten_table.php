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
        Schema::create('menu_items__asisten', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the menu item (e.g., 'Bible Reading')
            $table->string('route'); // The route name or URL path for the menu item
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status (active or inactive)
            $table->enum('type', ['daily', 'weekly'])->default('daily'); // Type of the menu item (daily or weekly)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items__asisten');
    }
};
