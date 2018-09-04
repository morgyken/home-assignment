<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionBids extends Model
{
    protected $table = 'question_bids';
    protected $dateFormat = 'Y/m/d H:i:s';
    protected $connection = 'mysql';
    public $timestamps = true;

    //bids to be awarded after 10 minutes to the best bidder

    public function testDatabase()
    {
        //$Question = factory(App\PostQuestionModel::class)->create();
    }

    protected $fillable = [ 'question_id','tutor_id', 'bidpoints', 'bid_price', 'question_deadline'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'remember_token',
    ];

}
