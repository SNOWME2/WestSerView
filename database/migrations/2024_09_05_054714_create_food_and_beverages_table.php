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
        Schema::create('food_and_beverages', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name');
            $table->string('description');
            $table->enum('category', ['Main Course', 'Desert', 'Beverages', 'Appetizer']);
            $table->float('price');
            $table->enum('status', ['Available', 'Not Available'])->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_and_beverages');
    }
};
