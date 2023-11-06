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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('monotributo_id', false, true)->nullable();
            $table->bigInteger('contact_id', false, true)->nullable();
            $table->bigInteger('abroad_contact_id', false, true)->nullable();
            $table->bigInteger('concept_id', false, true)->nullable();
            $table->date('receipt_date');
            $table->double('total_amount');
            $table->double('net_amount');
            $table->date('date_since')->nullable();
            $table->date('date_until')->nullable();
            $table->date('payment_due_date')->nullable();
            $table->bigInteger('receipt_type_id', false, true);
            $table->bigInteger('buyer_document_type_id', false, true)->nullable();
            $table->bigInteger('payment_method_id', false, true);
            $table->string('currency');
            $table->string('buyer_document')->nullable();
            $table->string('cae')->nullable();
            $table->date('cae_due_date')->nullable();
            $table->bigInteger('voucher_number')->nullable();
            $table->boolean('paid')->nullable();
            $table->bigInteger('ts_user_id', false, true)->nullable();
            $table->bigInteger('ts_activity_id', false, true)->nullable();
            $table->bigInteger('associated_receipt_id', false, true)->nullable();
            $table->smallInteger('sales_point')->nullable();
            $table->double('currency_trade')->nullable();
            $table->boolean('afip_coming');
            $table->bigInteger('user_create_id')->nullable()->unsigned();
            $table->bigInteger('user_update_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('concept_id')->references('id')->on('concepts');
            $table->foreign('monotributo_id')->references('id')->on('ts_arg_monotributos');
            $table->foreign('contact_id')->references('id')->on('ts_user_contacts');
            $table->foreign('abroad_contact_id')->references('id')->on('ts_abroad_user_contacts');
            $table->foreign('receipt_type_id')->references('id')->on('receipt_types');
            $table->foreign('buyer_document_type_id')->references('id')->on('buyer_document_types');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('ts_user_id')->references('id')->on('ts_users');
            $table->foreign('ts_activity_id')->references('id')->on('ts_activities');
            $table->foreign('associated_receipt_id')->references('id')->on('receipts');
            $table->foreign('user_create_id')->references('id')->on('users');
            $table->foreign('user_update_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
