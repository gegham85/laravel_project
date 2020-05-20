<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
    	$this->validate(request(), ['body' => 'required|min:2']);
    	
    	/*
    	Comment::create([
    		'body' => request('body'),
    		'post_id' => $post->id
    	]);
    	*/
    	
    	// or better yet. move that to post model
    	$post->addComment(request('body'));
    	
    	// yet another way:
    	//$post->comments()->create(['body'=>request('body')]);
    	
    	return back(); // redirect to the previous page
	}
}
