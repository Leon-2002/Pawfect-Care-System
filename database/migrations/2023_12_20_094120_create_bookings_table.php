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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('BookingID');
            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('ServiceID')->nullable();
            $table->foreign('ServiceID')->references('ServiceID')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('EmployeeID')->nullable();
             $table->foreign('EmployeeID')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('StartTime');
            $table->dateTime('EndTime');
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('barangay')->nullable();
            $table->string('petWeight')->nullable();
            $table->string('petType')->nullable();
            $table->string('serviceType')->nullable();
            $table->string('comments')->nullable();
            $table->enum('status', ['canceled', 'pending', 'confirmed', 'rejected','Accepted', 'completed'])->default('pending');
            $table->decimal('amount', 10, 2)->default(0);
            $table->enum('payment_status', [ 'unpaid','pending', 'paid'])->default('pending');
            $table->enum('isRated', [ 'True','False',])->default('False');// New column for tracking if the booking is rated
            $table->timestamps();
           
        });
        // Schema::create('bookings', function (Blueprint $table) {
        //     $table->id('BookingID');
        //     $table->foreignId('UserID')->constrained('users')->onDelete('cascade');
        //     $table->foreignId('ServiceID')->constrained('services')->onDelete('cascade');
        //     $table->foreignId('employee_id')->constrained('users')->onDelete('cascade');
        //     $table->dateTime('StartTime');
        //     $table->dateTime('EndTime');
        //     $table->enum('status', ['pending', 'confirmed', 'rejected', 'completed'])->default('pending');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
