<?php

namespace App;

class Comment extends Model
{
    public function post()
    {
		return $this->belongsTo(Post::class);    	
    }
    
    //$comment->user // grab user associated with the comment
    //$comment->user->name // grab the name of the user associated with the comment
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
