<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

	// not a good way; scope way is better
	// App\Task::iscomplete();
	public static function iscomplete()
	{
		return static::where('completed', 1)->get(); 
	}
	
	//Query Scopes way:
	//this way you can continue chaining: App\Task::incomplete()->where('id', '>', '2')->get();
	public function scopeIncomplete($query)
	{
		// prefix with scope, laravel know to treat this as query scope 
		// will expect existing query
		return $query->where('completed', 0);
	}
	
}
