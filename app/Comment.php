<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';


    /**
     * [Relationship] - Comment belongsTo Film
     */
    public function film()
    {
        return $this->belongsTo('App\Film','film_id');
    }


    /**
     * [Relationship] - Comment belongsTo User
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
