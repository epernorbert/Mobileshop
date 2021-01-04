@extends('master')


@section('title', 'Mobile Page')


@section('content_title')
	<h1>This is Mobile page</h1>
@endsection	


@section('content')

	<td>
		{{ $mobile->brand }}
		{{ $mobile->type }}
		{{ $mobile->color }}
		{{ $mobile->weight }} Gram
		{{ $mobile->screen_size }} Inch
	</td><br><br>	

	<div class="image">
		@foreach($image as $images)
			<img src="/mobileshop/storage/app/public/image/{{ $images->name }}" style="height: 200px;">
		@endforeach		
	</div>

	@if(Auth::check())
	<div>		
		<form action="{{ route('write.comment', $mobile->id) }}" method="post">	
			@csrf
			<input type="hidden" name='mobile_id' value="{{ $mobile->id }}">			
			<label>Write a comment</label><br>
			<textarea rows="4" cols="50" type="text" name="content"></textarea><br>
			<button type="submit" value="submit"> Send </button>		 
		</form>		 
	</div>
	@endif

	@if(session()->has('success_comment'))

		<p style="color: green;">{{session()->get('success_comment')}}<p>

	@endif

	<div>
	@if(count($comment) > 0)
		<h3>Comments: </h3>
			
			@foreach($comment as $comments)
				{{ $comments->fname }} 
				{{ $comments->lname }} |
				{{ $comments->content }} <br>
			@endforeach			
			
		@endif	
	</div>

@endsection