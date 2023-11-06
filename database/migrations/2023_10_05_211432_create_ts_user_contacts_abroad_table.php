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
        Schema::create('ts_abroad_user_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('commercial_address');
            $table->bigInteger('destination_country_id');
            $table->bigInteger('receiver_country_cuit');
            $table->string('tax_id')->nullable();
            $table->bigInteger('export_type_id');

            // required if export_type_id === 1
            $table->bigInteger('incoterm')->nullable();

            $table->string('incoterm_extra_info')->nullable();

            // required if export_type_id !== 1
            $table->date('payment_date')->nullable();

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
        Schema::dropIfExists('ts_user_contacts_abroad');
    }
};
