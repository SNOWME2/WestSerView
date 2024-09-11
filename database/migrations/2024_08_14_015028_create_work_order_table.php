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
        Schema::create('work_order', function (Blueprint $table) {
            $table->id('work_order_id');
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->unsignedBigInteger('room_id');
            $table->enum('work_type', ['housekeeping', 'maintenance']);
            $table->string('work_name');
            $table->String('work_desc');
            $table->enum('status', ['In-Progress', 'Not Accepted', 'Completed'])->default('Not Accepted');
            $table->timestamps();
            $table->foreign('staff_id')->references('staff_id')->on('staffs')->onDelete('cascade');
            $table->foreign('room_id')->references('room_id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_order');
    }
};