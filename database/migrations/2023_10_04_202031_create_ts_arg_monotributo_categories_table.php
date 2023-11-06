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
        Schema::create('ts_arg_monotributo_categories', function (Blueprint $table) {
            $table->id();
            $table->string('letter');
            $table->double('lower_limit');
            $table->double('upper_limit');
            $table->string('activity');
            $table->string('min_employee');
            $table->string('surface');
            $table->string('energy');
            $table->double('annual_rent');
            $table->double('max_amount');
            $table->double('service_tax');
            $table->double('thing_tax');
            $table->double('sipa_contribution');
            $table->double('os_contribution');
            $table->double('total_service');
            $table->double('total_thing');
            $table->boolean('is_letter')->default(1);
            $table->bigInteger('user_create_id')->nullable()->unsigned();
            $table->bigInteger('user_update_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_create_id')->references('id')->on('users');
            $table->foreign('user_update_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ts_arg_monotributo_categories');
    }
};
