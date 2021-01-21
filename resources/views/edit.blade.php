@extends('master')


@section('title', 'Edit Page')


@section('content')


	<form method="post" action="{{ route('update.mobile') }}">
		@csrf		
		<input type="hidden" name="id" value="{{ $mobile->id }}">
		<input type="text" name="brand" placeholder="Brand" required="" value="{{ $mobile->brand }}"><br>
		<input type="text" name="type" placeholder="Type" required="" value="{{ $mobile->type }}"><br>			
		<input type="text" name="color" placeholder="Color" required="" value="{{ $mobile->color }}"><br>	
		<input type="text" name="weight" placeholder="Weight (Gram)" required="" value="{{ $mobile->weight }}"><br>
		<input type="text" name="screen_size" placeholder="Screen size (Inch)" required="" value="{{ $mobile->screen_size }}"><br>
		<button type="submit">Update</button>				
	</form>


	<div>
		@if(count($comment) > 0)
			<h3>Comments: </h3>

			@foreach($comment as $comments)
				{{ $comments->content }}				
				<form method="post" action="{{ route('destroy.comment', $comments->id) }}" style="display: inline-block;">
					@csrf							
					<button type="submit">Delete</button>			
				</form>
				<br>
			@endforeach
			
		@endif	
	</div>


	@if(session()->has('success_delete_comment'))

		<p style="color: green;">{{session()->get('success_delete_comment')}}<p>

	@endif


@endsection