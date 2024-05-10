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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('TransactionID');
            $table->foreignId('UserID')->constrained('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('BookingID');
            $table->foreign('BookingID')->references('BookingID')->on('bookings')->onDelete('cascade');
            $table->unsignedBigInteger('ServiceID');
            $table->foreign('ServiceID')->references('ServiceID')->on('services')->onDelete('cascade');
            $table->decimal('Amount', 8, 2);
            $table->string('PaymentMethod');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
