<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginMeta extends Model
{
  
    protected $dateFormat = 'Y/m/d H:i:s';
    protected $connection = 'mysql';

    protected $fillable = [
        'tutor_id',
    ];
}
