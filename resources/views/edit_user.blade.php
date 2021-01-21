@extends('master')


@section('title', 'Edit user')


@section('content')
	<div>
		{{ $user->fname }}<br>
		{{ $user->lname }}<br>
		{{ $user->uname }}<br>
		{{ $user->email }}<br>
		{{ $user->created_at }}<br>
		{{ $user->updated_at }}<br>
	</div>

	<form method="post" action="{{ route('update.user', $user->id) }}">
		@csrf				
		<input type="radio" id="admin" name="user_type" value="1" {{ ($user->admin=="1")? "checked" : "" }}>
		<label for="admin">Admin</label><br>
		<input type="radio" id="user" name="user_type" value="0" {{ ($user->admin=="0")? "checked" : "" }}>
		<label for="user">User</label><br>
		<button type="submit">Update</button>				
	</form>

	@if(session()->has('success_update'))

		<p style="color: green;"> {{ @session()->get('success_update') }} <p>

	@endif

@endsection