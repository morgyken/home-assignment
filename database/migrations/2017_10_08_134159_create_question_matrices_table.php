<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_matrices', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->rememberToken();
            $table->integer('question_id')->unique();
            $table->integer('current')->default(0);
            $table->text('user_id')->default(0);
            $table->integer('reassigned')->default(0);
            $table->integer('completed')->default(0);
            $table->integer('rated')->default(0);
            $table->integer('paid')->default(0);
            $table->integer('tutor_id')->default(0);
            $table->integer('revision')->default(0);
            $table->integer('cancelled')->default(0);
            $table->integer('assigned')->default(0);
            $table->integer('answered')->default(0);
            $table->integer('mybid')->default(0);
            $table->integer('suggested')->default(0);
            $table->integer('disputed')->default(0);
            $table->integer('active')->default(0);

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_matrices');
    }
}
