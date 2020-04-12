<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'films';

     /**
     * [Relationship] - [Film] with [Comment]
     * Film (id) -> Comment (film_id)
     */
	
	public function comments()
    {
        return $this->hasMany('App\Comment','film_id');
    }

    public function filmCommentUser(){
        return $this->comments()->with('user');
    }

}
