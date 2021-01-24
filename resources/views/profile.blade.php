@extends('master')


@section('title', 'Profile Page')

@section('content')
	
	<h2>Personal data</h2>	

	<table border="1">
		<tr>
			<th>First Name</th>
			<td>{{Auth::user()->fname}}</td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td>{{Auth::user()->lname}}</td>
		</tr>
		<tr>
			<th>Username</th>
			<td>{{Auth::user()->uname}}</td>
		</tr>
		<tr>
			<th>Registration date</th>
			<td>{{Auth::user()->created_at}}</td>
		</tr>		
	</table>
	
	@foreach($billingData as $value)
		{{ $value->city }}
		{{ $value->post_code }}
		{{ $value->street }}
		{{ $value->house_number }}
		{{ $value->mobile_number }}
	@endforeach


@endsection