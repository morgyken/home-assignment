<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionMatrix extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['question_id','status', 'user_id' ];
    // 'current','cancelled',  'reassigned','completed' ,'rated','revision', 'suggested', 'bid', 'disputed','paid', 'user_id','active'

    protected $table='question_matrices';

    protected $dateFormat = 'Y/m/d H:i:s';
    protected $connection = 'mysql';
    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'remember_token',
    ];
}
