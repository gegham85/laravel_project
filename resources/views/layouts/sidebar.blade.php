<div class="sidebar">
	<h1>This is the sidebar</h1>
	<ul class="archive">
		@foreach($archives as $archive)
			<li>
				<a href="/?month={{ $archive['month'] }}&year={{ $archive['year'] }}">{{ $archive['month'] . ' ' . $archive['year'] }}</a>
			</li>
		@endforeach
	</ul>
	
	<ul class="tags">
		@foreach($tags as $tag)
			<li>
				<a href="/posts/tags/{{ $tag }}">{{ $tag }}</a>
			</li>
		@endforeach
	</ul>
</div>