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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id'); // This creates an unsignedBigInteger primary key
            $table->string('room_type');
            $table->string('room_desc')->nullable();
            $table->string('room_number')->unique();
            $table->integer('capacity')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('added_by');
            $table->timestamps();
            $table->enum('status', ['Reserved','Maintenance', 'Occupied', 'Dirty', 'Clean', 'Available'])->default('Available');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};