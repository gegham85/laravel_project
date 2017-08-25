<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	
// 	public static function incomplete(){
// 		return static::where('completed', 0)->get();
// 	}
	
	//Query Scopes way:
	public function scopeIncomplete($query){
		// prefix with scope, laravel know to treat this as query scope 
		// will expect existing query
		return $query->where('completed', 0);
	}
	
}
