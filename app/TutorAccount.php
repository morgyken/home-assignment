<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorAccount extends Model
{
    
    protected $table = 'tutor_accounts';
    protected $dateFormat = 'Y/m/d H:i:s';
    protected $connection = 'mysql';
    protected $fillable = 	[
    						'account_id', 'tutor_id', 'account_level', 

    					   'payment_method', 'account_status', 'payment_account', 'ratings',
                            'categories','account_level', 'account_status', 'payment_method', 'payment_account'
    						];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'id', 'remember_token',
    ];
}

    