<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function(){
	return view('about')->with('name', 'some name');
});

/*
Route::get('/tasks', function(){

	//query builder:
	//$tasks = DB::table('tasks')->get();	
	
	//eloquent (dedicated class):
	$tasks = Task::all();
	
	return view('tasks.index', [
		'tasks' => $tasks
	]);
});
*/
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');
