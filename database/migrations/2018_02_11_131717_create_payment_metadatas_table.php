<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentMetadatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //   'name', 'email' ,'country','city', 'state', 'zip'
    public function up()
    {
        Schema::create('payment_metadata', function (Blueprint $table) {
            $table->increments(10009);
            $table->rememberToken();
            $table->string('name');
            $table->string('email');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('question_id'); //customer email
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_metadatas');
    }
}
