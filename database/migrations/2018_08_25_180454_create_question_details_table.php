<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_details', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('user_id'); 
            $table->string('question_id'); 
            $table->string('urgency');
            $table->string('pagenum');
            $table->string('order_subject');

            $table->string('paper_type');
            $table->string('spacing'); 
            $table->string('paper_format'); 
            $table->string('academic_level');
            $table->string('lang_style');

            $table->string('question_price');
            $table->string('university');
            
            $table->string('question_deadline');
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
        Schema::dropIfExists('question_details');
    }
}
