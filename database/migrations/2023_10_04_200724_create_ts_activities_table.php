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
        Schema::create('ts_activities', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
            $table->longText('afip_activity');
            $table->bigInteger('afip_code');
            $table->string('rubro')->nullable();
            $table->boolean('tributo_simple')->nullable();
            $table->boolean('monotributo')->nullable();
            $table->bigInteger('activity_type');
            $table->longText('ts_code');
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
        Schema::dropIfExists('ts_activities');
    }
};
