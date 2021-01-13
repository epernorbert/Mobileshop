@extends('master')


@section('title', 'Order Page')


@section('content_title')
	<h1>This is order page</h1>
@endsection	


@section('content')
	
	<h2>Ordered Items</h2>

	@if(isset($cart))
		@foreach($cart as $key => $result)

			{{ $result['brand'] }}
			{{ $result['type'] }}
			{{ $result['color'] }}
			{{ $result['weight'] }} Gram
			{{ $result['screen_size'] }} Inch | 		
			Quantity: {{ $result['quantity'] }} <br>		
			
		@endforeach	
	@endif

	<h2>Billing details</h2>
	
	@foreach($billingData as $value)
	
		<div> City: {{$value->city}} </div>
		<div> Post code: {{$value->post_code}} </div>
		<div> Street: {{$value->street}} </div>
		<div> House number: {{$value->house_number}} </div>
		<div> Mobile number: {{$value->mobile_number}} </div>		

	@endforeach		

	<br>
	<form action="" method="">
		@csrf
		<button type="submit">Order complete</button>
	</form>

@endsection