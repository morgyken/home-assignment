<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AssignQuestion extends Model
{
    protected $table = 'assign_questions';
    protected $dateFormat = 'Y/m/d H:i:s';
    protected $connection = 'mysql';


    public function user(){
        return $this->belongsTo('App\User');
    }

    
    protected $fillable = [

        'user_id', 'question_id','assigned',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'username', 'remember_token',
    ];




}
