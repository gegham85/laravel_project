<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>

        <title>@yield('page_title')</title>

    </head>
    <body>
    
    	<div class="container">
	    	@yield('content')
    	</div>
    	
    	@include('layouts.footer')
        
    </body>
</html>
