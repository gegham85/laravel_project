@extends('layouts.master')

@section('content')

	{{ $post->title }}	

	@if (count($post->tags))
		<ul>
			@foreach ($post->tags as $tag)
			<li><a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a></li>
			@endforeach
		</ul>
	@endif
	<hr>
	
	<ul>
		@foreach($post->comments as $comment)
		<li>
			{{ $comment->body }}
		</li>
		@endforeach
	</ul>
	
	{{-- add a comment --}}
	<div class="card">
		<div class="card-block">
			<form method="POST" action="/posts/{{ $post->id }}/comments">
				{{ csrf_field() }}
				<div class="form-group">
					<textarea rows="" cols="" name="body" placeholder="your comment here" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Add comment</button>
				</div>
			</form>
			
			@include('layouts.errors')
	
		</div>
	</div>

@endsection