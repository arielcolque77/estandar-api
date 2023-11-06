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
            $table->string('username');
            $table->string('username_canonical')->unique();
            $table->string('email');
            $table->string('email_canonical')->unique();
            $table->boolean('enabled');
            $table->timestamp('last_login')->nullable();
            $table->string('confirmation_token')->unique()->nullable();
            $table->dateTime('password_requested_at')->nullable();
            $table->string('password')->nullable();
            // $table->bigInteger('ts_user_id')->unique()->nullable(); add this in a later migration
            $table->dateTime('last_password_change')->nullable();
            $table->boolean('expired_password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
