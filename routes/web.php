<?php

class Avvo
{
    private $example;

    public function __construct(Example $example)
    {
        $this->example = $example;
    }

    public function getFoo()
    {
        return $this->example->getSomething() . ' --> foo';
    }
}

class Example
{
    public function getSomething() {
        return 'somethoe';
    }

    public function avvo()
    {
        return new Avvo($this);
    }
}

Route::get('/', function() {

    $test = new Example($this);

    echo $test->avvo()->getFoo();

});

function test() {

    try {
        return 'yep something happened';
    } catch (Exception $e) {
        die('aaaaa');
    } finally {
        return 'return from finnally';
    }
}

Route::get('/test', function() {
    echo test();
});



//Route::get('/about', function(){
//	return view('about')->with('name', 'some name');
//	//OR:
//	//$name = 'using compact';
//	//$age = '31';
//	//return view('about', compact('name', 'age'));
//});
//
//Route::get('/tasks', 'TasksController@index');
//Route::get('/tasks/{task}', 'TasksController@show');
//Route::get('/tasks_old_way/{task}', 'TasksController@show_old_way');
//
//
//Route::get('/', 'PostsController@index')->name('home');
//Route::get('/posts/create', 'PostsController@create');
//Route::post('/posts', 'PostsController@store');
//Route::get('/posts/{post}', 'PostsController@show');
//
//Route::get('/posts/tags/{tag}', 'TagsController@index');
//
//Route::post('posts/{post}/comments', 'CommentsController@store');
//
//Route::get('/register', 'RegistrationController@create');
//Route::post('/register', 'RegistrationController@store');
//
//Route::get('/login', 'SessionsController@create')->name('login');
//Route::post('/login', 'SessionsController@store');
//Route::get('/logout', 'SessionsController@destroy');

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
