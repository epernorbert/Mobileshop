@extends('master')


@section('title', 'Login Page')


@section('content')


<style type="text/css">

.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-form-2{
    padding: 5%;
    background: #0062cc;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}
.login-form-2 .btnSubmit{
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
}
.login-form-2 .ForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.login-form-1 .ForgetPwd{
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
}

</style>


<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">

        	<!-- Sign In  -->

            <h3>Sign In</h3>
            <form method="post" action="{{ route('signIn.user') }}">
            	@csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username *" name="usernamee" />
                </div>
                @error('usernamee')
					<div style="color: red;">{{ $message }}</div>
				@enderror				
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password *" name="passwordd" />
                </div>
                @error('passwordd')
					<div style="color: red;">{{ $message }}</div>
				@enderror
                <div class="form-group">
                    <button type="submit" name="signup" class="btn btn-primary">Submit</button>
                </div> 
                @if(session('status'))

					<div style="color: red;">{{ session('status') }}</div>

				@endif                       
            </form>
        </div>        

        <div class="col-md-6 login-form-2">

        	<style type="text/css">
        		.error {
        			color: red;
        			background-color: white;
        			border-radius: 6px;
        			padding-left: 12px;
        			margin-top: -14px;
        			margin-bottom: 10px;
        		}
        		.success {
        			color: green;
        			background-color: white;
        			border-radius: 6px;        			
        			padding: 5px 0 5px 12px;
        		}
        	</style>

        	<!-- Sign Up -->

            <h3>Sign Up</h3>
            <form method="post" action="{{ route('register.user') }}" required="">
            	@csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Fist Name *" name="firstname" value="{{old('firstname')}}" />
                </div>
                @error('firstname')
					<div class="error"> {{ $message }} </div>
				@enderror
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Last Name *" name="lastname" value="{{old('lastname')}}"/>
                </div>
                @error('lastname')
					<div class="error"> {{ $message }} </div>
				@enderror
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username *" name="username" value="{{old('username')}}"/>
                </div>
                @error('username')
					<div class="error"> {{ $message }} </div>
				@enderror
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email *" name="email" value="{{old('email')}}"/>
                </div>
                @error('email')
					<div class="error"> {{ $message }} </div>
				@enderror
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password *" name="password" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password Again *" name="password_confirmation" />
                </div>
                @error('password')
					<div class="error"> {{ $message }} </div>
				@enderror
                <div class="form-group">
                    <button type="submit" name="signin" class="btn btn-light">Submit</button>
                </div>                                    
                @if(session('success'))

					<h5 class="success">Registration was successful, now you can Sign In!</h5>

				@endif
            </form>
        </div>
    </div>
</div>


@endsection

