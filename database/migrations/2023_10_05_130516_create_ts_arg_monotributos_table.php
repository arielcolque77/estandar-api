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
        Schema::create('ts_arg_monotributos', function (Blueprint $table) {
            $table->id();
            $table->string('cuit');
            $table->text('clave_fiscal')->nullable();
            $table->boolean('clave_fiscal_verified')->nullable();
            $table->double('afip_balance');
            $table->double('afip_debt');
            $table->string('email')->nullable();
            $table->text('privKey')->nullable();
            $table->text('certificateRequest')->nullable();
            $table->dateTime('certificateRequestDate')->nullable();
            $table->text('certificatePEM')->nullable();
            $table->dateTime('certificatePEMEmitionDate')->nullable();
            $table->dateTime('certificatePEMDueDate')->nullable();
            $table->text('certificatePEMHomo')->nullable();
            $table->bigInteger('sales_point', false, true)->nullable();
            $table->bigInteger('abroad_sales_point', false, true)->nullable();
            $table->bigInteger('how_to_work_id', false, true)->nullable();
            $table->boolean('physical_space')->nullable();
            $table->string('square_mts_number')->nullable();
            $table->string('annual_electric_energy')->nullable();
            $table->boolean('pay_rent')->nullable();
            $table->string('annual_rental_amount')->nullable();
            $table->double('estimated_monthly_amount')->nullable();
            $table->boolean('other_activity_income')->nullable();
            $table->string('employer_cuit')->nullable();
            $table->boolean('spouse_contributions')->nullable();
            $table->bigInteger('obra_social_id')->nullable();
            $table->bigInteger('monotributo_category_id', false, true)
                ->nullable();
            $table->bigInteger('residence_id', false, true)->nullable();
            $table->date('registration_date')->nullable();
            $table->boolean('approved')->nullable();
            $table->boolean('active')->default(1)->nullable();
            $table->bigInteger('deregistration_reason_id', false, true)->nullable();
            $table->dateTime('deregistration_date')->nullable();
            $table->boolean('automatic_debit')->default(0)->nullable();
            $table->string('cooperative_cuit')->nullable();
            $table->double('annual_bill')->nullable();
            $table->string('spouse_cuil')->nullable();

            $table->bigInteger('user_create_id')->nullable()->unsigned();
            $table->bigInteger('user_update_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('deregistration_reason_id')->references('id')->on('deregistration_reasons');
            $table->foreign('how_to_work_id')->references('id')->on('how_to_work');
            $table->foreign('user_create_id')->references('id')->on('users');
            $table->foreign('user_update_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ts_arg_monotributos');
    }
};
