<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>

        <title>@yield('page_title')</title>

        <!-- 
        to generate css file from sass you need to run:
        npm run dev 
        or
        npm run watch

        this will check the scripts section inside package.json 
        https://docs.npmjs.com/cli/run-scripts
         -->
		<link rel="stylesheet" href="/css/app.css" />
		<link rel="stylesheet" href="/css/app_test.css" />
		
    </head>
    <body>
    
    	@if ($flash = session('message'))
	    	<div class="alert alert-success" role="alert">
	    		{{ $flash }}
	    	</div>
    	@endif
    
    	<div class="top-nav">
    		@yield('top-nav')
    	</div>
    
    	<div class="container">
	    	@yield('content')
	    	
	    	
    		@include('layouts.sidebar')
    	</div>
    	
    	@include('layouts.footer')
        
    </body>
</html>
