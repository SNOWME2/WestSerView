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
        Schema::create('pos_incomes', function (Blueprint $table) {
            $table->id('income_id');
            $table->decimal('total_amount', 10, 2);
            $table->date('income_date');
            $table->enum('period', ['Daily', 'Monthly', 'Yearly']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_incomes');
    }
};
