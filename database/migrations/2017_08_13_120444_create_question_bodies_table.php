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
            $table->text('question_body');
            $table->text('user_id');
            $table->text('question_id');
            //$table->text('academic_level');
            $table->text('topic');
            $table->timestamps();
            $table->rememberToken();

        });
        DB::statement("ALTER TABLE question_bodies AUTO_INCREMENT = 10001;");
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
