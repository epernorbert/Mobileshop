<!DOCTYPE html>
<html lang="en">
<head>	
	<meta charset="utf-8">
	<title>@yield('title')</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap');	
	
	* {
		font-family: 'Poppins', sans-serif;
	}
	
	body {
		padding-top: 65px;
	}
</style>
	

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
 	<a class="navbar-brand" href="#">Logo</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
  	</button>

  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    	<ul class="navbar-nav mr-auto">
      		<li class="nav-item active">
        		<a class="nav-link" href="{{ route('home.page') }}">Home <span class="sr-only">(current)</span></a>
      		</li>
      		<li class="nav-item">
        		<a class="nav-link" href="{{ route('search.page') }}">Search</a>
      		</li>      
			@if(Auth::check() && Auth::user()->admin)
				<li class="nav-item">
			        <a class="nav-link" href="{{ route('admin.page') }}">Admin</a>
			    </li>
	 	    @endif         
    	</ul>    
    	<ul class="navbar-nav ml-auto">
    		@if(!Auth::check())
	      		<li class="nav-item">
	        		<a class="nav-link" href="{{ route('login.page') }}">Login | Register</a>
	      		</li>	      		
      		@else
	       		<li class="nav-item">
	        		<a class="nav-link" href="{{ route('cart.page') }}">Cart Item: {{ (Session::get('cart') == null ? '0' : count(Session::get('cart'))) }}</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link" href="{{ route('profile.page') }}">{{Auth::user()->uname}}</a>
	      		</li>
	  		@endif
    	</ul> 
    	@if(Auth::check())       
			<form class="form-inline my-2 my-lg-0" method="post" action="{{ route('logout.user') }}">
				@csrf
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
			</form>
		@endif
    	<form class="form-inline my-2 ml-lg-5 my-lg-0" action="{{ route('search.mobileFromHomePage') }}" method="post">
    		@csrf
      		<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    	</form>    
  	</div>
</nav>

<style type="text/css">

	.content {
		margin: 0 10%;
	}

	@media screen and (max-width: 600px) {
	  .content {
	    margin: 3%;
	  }
	}

</style>

<div class="content">

	@yield('content')	
	
</div>

</body>
</html>