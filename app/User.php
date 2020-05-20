<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts()
    {
		return $this->hasMany(Post::class);    	
    }
    
    public function publish(Post $post)
    {
    	$this->posts()->save($post);
    	//OR:
//     	$this->posts()->create([
//     		'title' => request('title'),
//     		'body' => request('body'),
//     		'user_id' => auth()->id(),
//     	]);

    	// but since we have the existing instance of the relation ( Post $post )
    	// which comes from this:new Post(request(['title', 'body'])) in postscontroller
    	
    	// since we have the posts() function and relation is set ( hasMany )
    	// then laravel will automatically set the user_id
    	
    			
    }
}
