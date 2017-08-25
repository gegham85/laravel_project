<?php

namespace App\Http\Controllers;

use App\Task;

class TasksController extends Controller
{
	public function index()
	{
		$tasks = Task::all();
		
		return view('tasks.index', [
				'tasks' => $tasks
		]);
	}
	
	public function show(Task $task) //Task::find($id);
	{
		
		//helper function: dumps the given variables and ends execution of the script
		//dd($task);
		
		//query builder:
		//$task = DB::table('tasks')->find($id);
		
		//$task = Task::find($id);
		
		return view('tasks.show', compact('task'));
	}
	
}
