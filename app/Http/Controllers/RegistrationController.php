<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;

class RegistrationController extends Controller
{
    public function create()
    {
		return view('registration.create');		
    }
    
    public function store()
    {
    	//validate the form
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed' // that's why confiramtion should be named password_confirmation
    	]);
    	
    	//create and save the user
    	$user = User::create([
    		'name' => request('name'),
    		'email' => request('email'),
    		'password' => bcrypt(request('password'))
    	]);
    	
    	//sign them in. you can use Auth facade
    	//\Auth::login();
    	//or:
    	auth()->login($user);
    	
    	\Mail::to($user)->send(new Welcome($user));
    	
    	session()->flash('message', 'Thanks so much for siging up');
    	
    	//redirect to the home page
    	return redirect()->home(); //Route::get('/', 'PostsController@index')->name('home');
    	
    }
}
