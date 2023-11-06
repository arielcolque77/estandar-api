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
        Schema::create('ts_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('country_id', false, true);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('cuit')->unique()->nullable();
            $table->date('birth_date');
            $table->string('address')->nullable();
            $table->string('cellphone');
            $table->string('email');
            $table->bigInteger('recommended', false, true)->nullable();
            $table->bigInteger('state_id', false, true)->nullable();
            $table->boolean('active')->nullable();
            $table->text('accountant_message')->nullable();
            $table->bigInteger('real_residence_id', false, true)->nullable();
            $table->bigInteger('fiscal_residence_id', false, true)->nullable();
            $table->bigInteger('tax_jurisdiction_id', false, true)->nullable();
            $table->dateTime('unsubscription_date')->nullable();
            $table->boolean('reenter_data')->default(0);
            $table->boolean('tax_report_service')->default(0);
            $table->date('tax_report_service_registration_date')->nullable();
            $table->boolean('billing_service')->default(0);
            $table->date('billing_service_registration_date')->nullable();
            $table->boolean('accounting_service')->default(0);
            $table->date('accounting_service_registration_date')->nullable();
            $table->date('blocked_user_date')->nullable();

            $table->bigInteger('user_create_id')->nullable()->unsigned();
            $table->bigInteger('user_update_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('state_id')->references('id')->on('ts_user_states');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('real_residence_id')->references('id')
                ->on('residences');
            $table->foreign('fiscal_residence_id')->references('id')
                ->on('residences');
            $table->foreign('tax_jurisdiction_id')->references('id')
                ->on('provinces');
            $table->foreign('user_create_id')->references('id')->on('users');
            $table->foreign('user_update_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ts_users');
    }
};
