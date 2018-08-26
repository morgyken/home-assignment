<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionDetails extends Model
{
    protected $table = 'question_details';
    protected $dateFormat = 'Y/m/d H:i:s';
    protected $connection = 'mysql';
    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
    protected $fillable = [
    	'question_id','paper_format', 'urgency', 'pagenum', 'order_subject', 'paper_type', 'user_id'
    	'spacing', 'paper_format', 'academic_level', 'lang_style', 
    	'question_price', 'university', 'question_deadline' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'remember_token',
    ];
}
