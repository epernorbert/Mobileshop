@extends('master')


@section('title', 'Home Page')


@section('content_title')
	<h1>This is Home page</h1>
@endsection	


@section('content')
	
	<h2>Legfrissebb kínálat</h2>

	@foreach($mobile as $mobiles)
		
		<a href="{{ route('mobile.page', $mobiles->id) }}">
			<td>
				{{ $mobiles->brand }}
				{{ $mobiles->type }}
				{{ $mobiles->color }}
				@if(Auth::check())
					<a href="{{ route('add.toCart', $mobiles->id) }}" name="cart" id="cart">
						<button>Add to cart</button>
					</a>
				@endif
			</td>
		<a/><br>

	@endforeach

	{{ Session::get('number') }}<br>
	

@endsection