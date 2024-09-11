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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('reservation_id');
            $table->unsignedBigInteger('guest_id')->nullable();
            $table->unsignedBigInteger('room_id');

            $table->string('reservation_type')->nullable();
            $table->datetime('reservation_start_date');
            $table->datetime('reservation_end_date');
            $table->text('special_requests')->nullable();
            $table->enum('status', ['Arrived', 'Departed', 'Cancelled',])->nullable();


            $table->string('guest_name')->nullable(); // Add this line for on-site guest name
            $table->string('guest_contact_or_email')->nullable(); // Add this line for on-site guest contact
            $table->integer('number_of_guest');

            $table->string('added_by')->nullable();
            $table->enum('mode_of_reservation', ['Online', 'On-site'])->default('Online');

            $table->timestamps();

            $table->foreign('guest_id')->references('guest_id')->on('guests')->onDelete('cascade');
            $table->foreign('room_id')->references('room_id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};