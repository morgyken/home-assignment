<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_bodies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('summary');
            $table->text('special');
            $table->text('question_body');
            $table->integer('question_id')->unique();
            $table->text('user_id');
            $table->text('topic');
            $table->text('category');
            $table->timestamps();
            $table->rememberToken();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_bodies');
    }
}
