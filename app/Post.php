<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
	//protected $fillable = ['title', 'body']; // here's the fields that we are fine to be mass assigned
	
	// fillable could get annoying when table gets bigger, you could use guarded instead which is inverse:
	protected $guarded = []; //this is the fields that are not supposed to be changed on mass assignment. It's empty so we're not guarding anything

	// or instead of doing this for every class you could create a parent class. It is created as Model.php
	// and post will extend our own model !!!
	
	public function comments()
	{
		return $this->hasMany(Comment::class); // equivalent to saying this: return $this->hasMany('App\Comment');
	}
	
	public function user()
	{
		return $this->belongsTo(User::class); 
	}
	
	public function addComment($body)
	{
		/*
		Comment::create([
			'body' => $body,
			'post_id' => $this->id
		]);
		*/
		
		//NOTE:
		//$this->comments // returns all the comments associated with this post
		//$this->comments()->create() // this will set id of the post on the new comment because the relationship set up on the above function
		
		//or even better:
		//$this->comments()->create(['body' => $body]);
		$this->comments()->create(compact('body'));
		
	}
	
	public function scopeFilter($query, $filters)
	{
		if ($month = $filters['month']) {
			$query->whereMonth('created_at', Carbon::parse($month)->month);
		}
		
		if ($year = $filters['year']) {
			$query->whereYear('created_at', $year);
		}
	}
	
	public static function archives()
	{
		return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
			->groupBy('year', 'month')
			->orderByRaw('min(created_at) desc')
			->get()
			->toArray();
	}
	
	public function tags()
	{
		return $this->belongsToMany(Tag::class); 
	}
}
