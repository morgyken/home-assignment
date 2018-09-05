<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RandomNames extends Model
{
    protected $dateFormat = 'Y/m/d H:i:s';

    protected $connection = 'mysql';

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $table = 'random_names';

    public function testDatabase()
    {
        //$Question = factory(App\PostQuestionModel::class)->create();
    }
    
    protected $fillable = ['question_id', 'user_id', 'status' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
