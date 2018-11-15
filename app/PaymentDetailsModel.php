<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDetailsModel extends Model
{
     protected $table = 'payment_details_models';

  protected $dateFormat = 'Y/m/d H:i:s';
  protected $connection = 'mysql';


  protected $fillable = [
       'question_id' ,'tutor_id','user_id', 'amount' , 'status'
  ];

  protected $hidden = [
      'id', 'remember_token',
  ];
}

