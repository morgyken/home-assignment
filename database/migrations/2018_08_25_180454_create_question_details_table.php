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
            $table->string('question_id'); 
            $table->string('urgency')->nullable();
            $table->string('pagenum')->nullable();
            $table->string('order_subject')->nullable();
            $table->string('paper_type')->nullable();
            $table->string('spacing')->nullable(); 
            $table->string('paper_format')->nullable(); 
            $table->string('lang_style')->nullable();
            $table->string('order_summary')->nullable();
            $table->string('question_price')->nullable();
            $table->string('university')->nullable();
            $table->string('tutor_price')->nullable();
            $table->string('academic_level')->nullable();
            $table->string('question_deadline')->nullable();
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
