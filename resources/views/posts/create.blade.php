@extends('layouts.master')

@section('content')
	<h1>create a post</h1>
	
	<form method="POST" action="/posts">
		
		{{ csrf_field() }}
		
		<label>Title:</label>
		<input type="text" id="title" name="title">
	
		<label>body:</label>
		<textarea name="body" id="body"></textarea>
		<button type="submit">Submit</button>
	</form>

	@include('layouts.errors')
	
@endsection