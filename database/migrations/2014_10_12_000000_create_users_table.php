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
        Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name')->nullable();
        $table->string('email')->unique();
        $table->string('contact_number')->nullable();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('Photo')->nullable();
        $table->enum('role', ['admin', 'user', 'employee']);
        $table->enum('status', ['busy', 'inactive', 'available'])->default('available');
        $table->string('region')->nullable();
        $table->string('province')->nullable();
        $table->string('city')->nullable();
        $table->string('barangay')->nullable();
        $table->string('serviceType')->nullable(); 
        $table->text('description')->nullable();
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
