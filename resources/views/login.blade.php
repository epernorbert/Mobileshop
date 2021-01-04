@extends('master')


@section('title', 'Login Page')


@section('content_title')
	<h1>This is Login page</h1>
@endsection	


@section('content')

<form method="post" action="{{ route('signIn.user') }}">
	@csrf
	<input type="text" name="username" placeholder="Username" required=""><br>
	@error('username')
		<div style="color: red;">{{ $message }}</div>
	@enderror
	<input type="password" name="password" placeholder="Password" required=""><br>
	@error('password')
		<div style="color: red;">{{ $message }}</div>
	@enderror
	<button type="submit" name="submit">Submit</button><br>
	@if(session('status'))

		<div style="color: red;">{{ session('status') }}</div>

	@endif
</form>

@endsection

