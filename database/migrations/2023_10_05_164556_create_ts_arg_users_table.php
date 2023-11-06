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
        Schema::create('ts_arg_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ts_user_id', false, true);
            $table->string('dni')->unique();
            $table->bigInteger('monotributo_id', false, true)->unique();
            $table->boolean('isMonotributista')->nullable();
            $table->boolean('IIBB_registered')->nullable();
            $table->date('activities_start_date')->nullable();
            $table->boolean('unified_monotributo')->default(0);
            $table->string('sIsMonotributista')->nullable();
            $table->string('sRegisteredIIBB')->nullable();
            $table->bigInteger('user_create_id')->nullable()->unsigned();
            $table->bigInteger('user_update_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ts_user_id')->references('id')->on('ts_users');
            $table->foreign('monotributo_id')->references('id')->on('ts_arg_monotributos');
            $table->foreign('user_create_id')->references('id')->on('users');
            $table->foreign('user_update_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ts_arg_users');
    }
};
