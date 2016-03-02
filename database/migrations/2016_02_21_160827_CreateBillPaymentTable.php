<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transactionid', 40);
            $table->string('external_transactionid');
            $table->string('merchant_code');
            $table->string('description');
            $table->string('reference_number');
            $table->string('msisdn',12);
            $table->decimal('amount',10,2);
            $table->string('status');
            $table->string('response_code');
            $table->string('response_description');
            $table->text('raw_request_from_payment_gw')->nullable();
            $table->text('raw_response_to_payment_gw')->nullable();
            $table->text('raw_request_to_merchant')->nullable();
            $table->text('raw_response_from_merchant')->nullable();
            $table->string('merchant_host');
            $table->integer('api_key_id', false, true)->nullable();
            $table->string('ip_address');
            $table->timestamps();

            $table->index('merchant_code');
            $table->index('transactionid');

            $table->unique('transactionid');
            $table->foreign('api_key_id')->references('id')->on('api_keys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bill_payments');
    }
}
