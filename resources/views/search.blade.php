@extends('master')


@section('title', 'Seach Page')


@section('content')
		

	<!-- <form action="" method="post">
		@csrf
		<label>Brand</label><br>
		<input type="text" name="brand"><br>
		<label>Type</label><br>
		<input type="text" name="type"><br>		
		<label>Price</label><br>
		<input type="number" name="price_from" placeholder="from"><br>
		<input type="number" name="price_to" placeholder="to"><br>		
		<button type="submit" value="submit">Search</button>
	</form> -->

	<!-- <div style="float: left; width: 30%; height: 500px; background-color: red;">
		<div class="text-center pt-5">
			<form action="" method="post">
				@csrf
				<label>Brand</label><br>
				<input type="text" name="brand"><br>
				<label>Type</label><br>
				<input type="text" name="type"><br>		
				<label>Price</label><br>
				<input type="number" name="price_from" placeholder="from"><br>
				<input type="number" name="price_to" placeholder="to"><br>		
				<button type="submit" value="submit">Search</button>
			</form>
		</div>
	</div> -->	

<style type="text/css">

	

	.login-form-2{
	    padding: 5%;
	    background: #0062cc;
	    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
	}
	.login-form-2 h2{
	    text-align: center;
	    color: #fff;
	}
	
	.btnSubmit{
	    width: 50%;
	    border-radius: 1rem;
	    padding: 1.5%;
	    border: none;
	    cursor: pointer;
	}

	.login-form-2 .btnSubmit{
	    font-weight: 600;
	    color: #0062cc;
	    background-color: #fff;
	}	

</style>

	<div class="m-5"></div>

    
    
    <div class="row">

    	<div class="col-xl-4 col-lg-6">    		
	    	<div class="login-form-2 mb-3" style="border-radius: 5px; padding: 10%;">        	

		    	<!-- Sign Up -->

		        <h2>Find Your phone</h2>
		        <form method="post" action="">
		        	@csrf
		            <div class="form-group">                	
		                <input type="text" id="brand" class="form-control" placeholder="Brand" name="brand" />
		            </div>				
		            <div class="form-group">
		                <input type="text" class="form-control" placeholder="Type" name="type"/>
		            </div>
		            <div class="form-group">
		                <input type="number" class="form-control" placeholder="Price from" name="lastname"/>
		            </div>
		            <div class="form-group">
		                <input type="number" class="form-control" placeholder="Price to" name="lastname"/>
		            </div>
		            <div class="form-group">
		                <button type="submit" name="signin" class="btn btn-light">Search</button>
		            </div>                                                    
		        </form>
		    </div>		    
		</div>

        @foreach($item as $data)
            <div class="col-sm">
                <div class="card text-center border-dark mb-3 pt-3 px-2">
				  <img src="/mobileshop/storage/app/public/image/{{ $data->name }}" class="card-img-top mx-auto" alt="" style="height: 180px; width: auto;">
				  <div class="card-body">
				    <h5 class="card-title">{{ $data->brand }} <br> {{ $data->type }}</h5>
				    <p class="card-text">
				    	Color: {{ $data->color }} <br> 
				    	Weight: {{ $data->weight }} <br> 
				    	Screen size:{{ $data->screen_size }} <br>
				    	Price: 123 € <br>					    	
				    </p>
				    <a href="{{ route('mobile.page', $data->mobile_id) }}" class="btn btn-primary">Check</a><br><br>
				    @if(Auth::check())
						<a href="{{ route('add.toCart', $data->mobile_id) }}" name="cart" id="cart">
							<button type="button" class="btn btn-outline-primary">Add to cart</button>
						</a>					
					@endif
				  </div>
				</div>
            </div>
        @endforeach
    </div>
			    
    <div class="d-flex justify-content-center" align="right">
    	{!! $item->links() !!}
	</div>
	
	
		

@endsection