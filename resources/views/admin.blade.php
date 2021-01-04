@extends('master')


@section('title', 'Admin Page')


@section('content_title')
	<h1>This is Admin page</h1>
@endsection	


@section('content')
	

	@if(session()->has('success_delete'))

		<p style="color: green;">{{session()->get('success_delete')}}<p>

	@endif

	<h2>Mobiles</h2>
	<a href="{{ route('upload.page') }}">Upload</a>
	<br>
	@foreach($mobile as $mobiles)
					
	<div style="float: left;">
		{{ $mobiles->brand }}
		{{ $mobiles->type }}
		{{ $mobiles->color }}
		{{ $mobiles->weight }}
		{{ $mobiles->screen_size }}&nbsp&nbsp
	</div>							
		
		<form method="post" action="{{ route('destroy.mobile', $mobiles->id) }}" style="display: inline-block;">
			@csrf			
			<button type="submit">Delete</button>			
		</form>	
		
		<a href="{{ route('edit.mobile', $mobiles->id) }}">
			<button>Edit</button>
		</a><br>		
		
	@endforeach

	<div>
		<h2>Users</h2>
		@foreach($user as $users)
			{{ $users-> fname }} |
			{{ $users-> lname }} |
			{{ $users-> uname }} |
			{{ $users-> email }} |
			{{ $users-> admin }} |
			{{ $users-> created_at }}

			<form method="post" action="{{ route('destroy.user', $users->id) }}" style="display: inline-block;">
				@csrf
				<button type="submit"> Delete </button>
			</form>	

			<a href="{{ route('edit.user', $users->id) }}">
				<button>Edit</button>
			</a><br>		

		@endforeach

		@if(session()->has('success_delete_user'))

			<p style="color: green;">{{session()->get('success_delete_user')}}<p>

		@endif

	</div>

@endsection