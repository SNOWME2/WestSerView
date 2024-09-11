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
        Schema::create('staff_attendance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->timestamp('login_at')->nullable();
            $table->timestamp('logout_at')->nullable();
            $table->timestamps();

            $table->foreign('staff_id')->references('staff_id')->on('staffs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_attendance');
    }
};
