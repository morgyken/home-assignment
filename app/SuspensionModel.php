<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuspensionModel extends Model
{
    
    protected $table = 'suspension_models';
    protected $dateFormat = 'Y/m/d H:i:s';
    protected $connection = 'mysql';

    protected $fillable = [
        'tutor_id', 'mode', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'account_id', 'remember_token',
    ];
}
