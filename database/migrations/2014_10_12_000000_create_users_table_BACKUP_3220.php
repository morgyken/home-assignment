<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');         
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_serial');
            $table->string('user_role')->default('cust');
            $table->string('user_level')->default('New');
<<<<<<< HEAD
            $table->string('intro_text');
=======
            $table-> string('intro-text');
>>>>>>> parent of 7249be8... Adding Image Crops
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}