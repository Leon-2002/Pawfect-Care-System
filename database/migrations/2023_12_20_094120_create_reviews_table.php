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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('ReviewID');
            // $table->foreignId('BookingID')->constrained('bookings')->onDelete('cascade');
            $table->unsignedBigInteger('BookingID');
            $table->foreign('BookingID')->references('BookingID')->on('bookings')->onDelete('cascade');
            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->integer('star_rating');
            $table->text('Comments')->nullable();
            $table->timestamps();
           
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
