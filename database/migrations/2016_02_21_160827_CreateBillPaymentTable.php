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
            $table->string('merchant_number');
            $table->string('description');
            $table->string('method', 6);
            $table->decimal('amount',10,2);
            $table->string('response_code');
            $table->string('response_description');
            $table->string('payment_reference');
            $table->text('raw_request')->nullable();
            $table->text('raw_response')->nullable();
            $table->string('merchant_host');
            $table->integer('api_key_id', false, true)->nullable();
            $table->string('ip_address');
            $table->timestamps();

            $table->index('method');
            $table->index('merchant_number');
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
        Schema::drop('BillPayments');
    }
}
