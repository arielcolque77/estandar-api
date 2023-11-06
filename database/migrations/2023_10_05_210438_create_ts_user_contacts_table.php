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
        Schema::create('ts_user_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('street')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('type_id', false, true);
            $table->string('photo')->nullable();
            $table->bigInteger('ts_user_id', false, true);
            $table->smallInteger('number')->nullable();
            $table->string('floor')->nullable();
            $table->string('department')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code');
            $table->string('additional_data_type')->nullable();
            $table->string('additional_data')->nullable();
            $table->bigInteger('vat_condition_id', false, true)->nullable();
            $table->boolean('enabled')->nullable();
            $table->bigInteger('province_id', false, true)->nullable();
            $table->string('company_name')->nullable(); // razón social
            $table->bigInteger('user_create_id')->nullable()->unsigned();
            $table->bigInteger('user_update_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('type_id')->references('id')->on('ts_user_contact_types');
            $table->foreign('vat_condition_id')->references('id')->on('vat_conditions');
            $table->foreign('ts_user_id')->references('id')->on('ts_users');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('user_create_id')->references('id')->on('users');
            $table->foreign('user_update_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ts_user_contacts');
    }
};
