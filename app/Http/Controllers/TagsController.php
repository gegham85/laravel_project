<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
	public function index(Tag $tag) // check getRouteKeyName method to change where condition to name for type hint
    {
		$posts = $tag->posts;
		
    	return view('posts.index', compact('posts'));
    }
}
