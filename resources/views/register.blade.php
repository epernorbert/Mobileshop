@extends('master')


@section('title', 'Register Page')


@section('content_title')
	<h1>This is Register page</h1>
@endsection	


@section('content')

<form method="post" action="{{ route('register.user') }}" required="">
	@csrf
	<input type="text" name="firstname" placeholder="First name" required="" value="{{old('firstname')}}"><br>
	@error('firstname')
		{{ $message }}<br>
	@enderror
	<input type="text" name="lastname" placeholder="Last name" required="" value="{{old('lastname')}}"><br>
	@error('lastname')
		{{ $message }}<br>
	@enderror
	<input type="text" name="username" placeholder="Username" required="" value="{{old('username')}}"><br>
	@error('username')
		{{ $message }}<br>
	@enderror
	<input type="email" name="email" placeholder="E-mail" required="" value="{{old('email')}}"><br>
	@error('email')
		{{ $message }}<br>
	@enderror
	<input type="password" name="password" placeholder="Password" required=""><br>
	<input type="password" name="password_confirmation" placeholder="Password again" required=""><br>	
	@error('password')
		{{ $message }}<br>
	@enderror
	<button type="submit" name="submit">Submit</button><br>	
	@if(session('success'))

		{{ session('success') }}

	@endif
</form>

@endsection

