@extends('layouts.master')

@section('top-nav')
	@if(Auth::check())
		{{ Auth::user()->name  }}
	@endif
@endsection

@section('content')
	<ul>
	@foreach($posts as $post)
		<li>
			<a href="/posts/{{ $post->id }}">
				{{ $post->title }}	
				<!-- toFormattedDateString: when you have timestamps this will automatically be instance of library called carbon -->
				{{ $post->user->name }} on
				{{ $post->created_at->toFormattedDateString() }}
			</a>
		</li>
	@endforeach
	</ul>
	
@endsection