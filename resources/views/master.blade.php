<!DOCTYPE html>
<html lang="en">
<head>	
	<meta charset="utf-8">
	<title>@yield('title')</title>
</head>
<body>
	
	@yield('content_title')
	
	<nav>
		<ul>			
			<a href="{{ route('home.page') }}"><li>Home</li><a>
			<a href="{{ route('search.page') }}"><li>Search</li><a>
			@if(!Auth::check())
				<a href="{{ route('login.page') }}"><li>Login</li><a>
				<a href="{{ route('register.page') }}"><li>Registration</li><a>
			@else
				<li>{{Auth::user()->uname}}</li>									
			@endif
			@if(Auth::check() && Auth::user()->admin)
				<a href="{{ route('admin.page') }}"><li>Admin</li><a>				
			@endif
		</ul>
	</nav>

	@if(Auth::check())
	<form method="post" action="{{ route('logout.user') }}">
		@csrf
		<button type="submit">Logout</button>
	</form>
	@endif

	@yield('content')

</body>
</html>