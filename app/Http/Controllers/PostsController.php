<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
Use App\Tag;

// keep in mind that "php artisan make:controller PostsController -r"
//will automatically populate crud methods! try it out! it's not done for this controller tho

class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);		
	}
	
    public function index()
    {
    	//$posts = Post::orderBy('created_at', 'asc')->get();
		$posts = Post::latest()
			->filter(request(['month', 'year']))
			->get();
		
		//$archives = Post::archives(); // this is moved to AppServiceProvider
		
    	return view('posts.index', compact('posts'));
	}
	
	public function create()
	{
		return view('posts.create');	
	}
	
	public function store()
	{
		
		// it will redirect to same page in case it's not valid
		$this->validate(request(), [
			'title' => 'required|min:5',
			'body' => 'required',
		]);
		
// 		$post = new Post;
// 		$post->title = request('title');
// 		$post->body = request('body');
// 		$post->save();
		
		//another way:
// 		Post::create([
// 			'title' => request('title'),
// 			'body' => request('body'),
//  		//'user_id' => auth()->user()->id,
// 			// or with helper function:
// 			'user_id' => auth()->id(),
// 		]);
		
		//or you can do this!!!:
		auth()->user()->publish(
			new Post(request(['title', 'body']))
		);
		
		return redirect('/');
	}
	
	public function show(Post $post)
	{
		return view('posts.show', compact('post'));
	}
}
