<?php

namespace App\Http\Controllers;

use App\Task;

class TasksController extends Controller
{
	public function index()
	{
		//query builder:
		//$tasks = DB::table('tasks')->get();	
		
		$tasks = Task::all();
		
		return view('tasks.index', [
				'tasks' => $tasks
		]);
	}
	
	// Route Model Binding
	public function show(Task $task) //actually is going to do Task::find($id) for you; NOTE: laravel will expect primary key
	{
		//query builder:
		//$task = DB::table('tasks')->find($id);
		// OR:
		//$task = Task::find($id);
		
		return view('tasks.show', compact('task'));
	}
	
	public function show_old_way($id)
	{
		$task = Task::find($id);
		return view('tasks.show', compact('task'));
	}
	
}
