<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {

            $table->increments('id');
            $table->string('names');
            $table->string('address');
            $table->string('service_fees');
            $table->string('bank_account_number');
            $table->string('bank_account_name');
            $table->string('bank_name');
            $table->string('merchant_code');
            $table->string('contact_person_names');
            $table->string('contact_person_phone_number');
            $table->string('contact_person_email');
            $table->string('settlement_frequency'); // Weekly/Monthly
            $table->string('test_url');
            $table->string('test_key');
            $table->string('live_url');
            $table->string('live_key');
            $table->text('raw_request')->nullable();
            $table->string('user_id');

            $table->timestamps();
            
            $table->unique('bank_account_number');  
            $table->index('bank_account_number');

            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('merchants');
    }
}
