<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // to fix the "1071 Specified key was too long" error
    	Schema::defaultStringLength(191);
    	
    	// I added this
    	// this listen for where layouts.sidebar is loaded, for example in master.blade.php @include('layouts.sidebar') line,
    	// then I want to register the callback function to include anything to that view
    	view()->composer('layouts.sidebar', function($view){
    		$view->with('archives', \App\Post::archives());
    		$view->with('tags', \App\Tag::has('posts')->pluck('name'));
    	});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
