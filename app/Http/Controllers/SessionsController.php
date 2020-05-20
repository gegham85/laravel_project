<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'destroy']); // if you're authenticate then you won't have access to any of this method in sessionsController
	}
	
    public function create()
    {
    	return view('sessions.create');
    }
    
    public function destroy()
    {
    	auth()->logout();
    	
    	return redirect()->home();
    }
    
    public function store()
    {
    	// attempt method takes care of all the logic including comparing credentials 
    	//and if match automatically sign the user in
		if(!auth()->attempt(request(['email', 'password']))){
			return back()->withErrors([
				'message' => 'please check your credentials'
			]);
		}
		
		return redirect()->home();
    }
}
