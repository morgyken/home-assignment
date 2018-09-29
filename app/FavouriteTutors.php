<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavouriteTutors extends Model
{
    //
    protected $table = 'favourite_tutors';
    protected $dateFormat = 'Y/m/d H:i:s';
    protected $connection = 'mysql';

    protected $fillable = ['tutor_id', 'question_id','customer_id' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'tutor_id', 'remember_token',
    ];
}
