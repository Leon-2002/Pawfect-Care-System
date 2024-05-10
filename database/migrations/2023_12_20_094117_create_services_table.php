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
        Schema::create('services', function (Blueprint $table) {
            $table->id('ServiceID');
            $table->string('ServiceName');
            $table->text('Description');
            $table->decimal('Price', 8, 2);
            // $table->unsignedBigInteger('UserID');
            //  $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            //  $table->unsignedBigInteger('EmployeeID');
            //  $table->foreign('EmployeeID')->references('id')->on('users')->onDelete('cascade');
            //  $table->foreignId('UserID')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
