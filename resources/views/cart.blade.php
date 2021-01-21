@extends('master')


@section('title', 'Cart Page')


@section('content')
	
	<h2>A kosár tartalma</h2>	
	
	@if(isset($cart))
		@foreach($cart as $key => $result)

			{{ $result['brand'] }}
			{{ $result['type'] }}
			{{ $result['color'] }}
			{{ $result['weight'] }} Gram
			{{ $result['screen_size'] }} Inch | 						
			Mennyiség: {{$result['quantity']}}			

			<form method="post" action="{{ route('cart.quantityAdd') }}" style="display: inline-block;">
				@csrf	
				<input type="hidden" name="key" value="{{ $key }}">								
				<button>+</button>								
			</form>

			<form method="post" action="{{ route('remove.item') }}" style="display: inline-block;">
				@csrf					
				<input type="hidden" name="index" value="{{ $key }}">			
				<button type="submit">Remove</button>
			</form>
			<br>

		@endforeach	
	@endif

	@if(!empty($cart))
		<a href="{{ route('billing.page') }}">
			<button>Add billing details</button>
		</a>		
	@endif	

@endsection