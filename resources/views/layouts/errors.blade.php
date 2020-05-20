@if(count($errors))
	<div class="errors"> 
		<ul>
			<!-- $errors will be included in every single view -->
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
