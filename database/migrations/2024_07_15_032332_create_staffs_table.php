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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id('staff_id');

            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['Front Desk', 'Maintenance', 'House Keeper', 'Food&Beverages'])->default('Front Desk');
            $table->rememberToken();
            $table->string('status')->default('Offline');
            $table->timestamp('last_activity_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
