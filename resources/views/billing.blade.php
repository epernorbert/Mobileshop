@extends('master')


@section('title', 'Billing Page')


@section('content_title')
	<h1>This is billing page</h1>
@endsection	


@section('content')
	
	<h2>Billing details</h2>

	@if(isset($billingData))

		@foreach($billingData as $value)
			<form method="post" action="{{ route('billingData.update') }}">
				@csrf
				<input type="hidden" name="id" value="{{ $value->id}} ">
				<input type="text" name="city" placeholder="City" value="{{ $value->city }}"><br>
				<input type="number" name="post_code" placeholder="Post code" value="{{ $value->post_code }}"><br>
				<input type="text" name="street" placeholder="Street" value="{{ $value->street }}"><br>
				<input type="text" name="house_number" placeholder="House number" value="{{ $value->house_number }}"><br>
				<input type="number" name="mobile_number" placeholder="Mobile number" value="{{ $value->mobile_number }}"><br>
				<button type="submit" value="submit">Save</button>
			</form>			
		@endforeach

		@else

		<form method="post" action="{{ route('billingData.save') }}">
			@csrf
			<input type="text" name="city" placeholder="City"><br>
			<input type="number" name="post_code" placeholder="Post code"><br>
			<input type="text" name="street" placeholder="Street"><br>
			<input type="text" name="house_number" placeholder="House number"><br>
			<input type="number" name="mobile_number" placeholder="Mobile number"><br>
			<button type="submit" value="submit">Save</button>
		</form>

	@endif

@endsection