@extends('master')


@section('title', 'Home Page')


@section('content')	
		
    <h1 class="mt-2">Latest Devices</h1>    

		@foreach(array_chunk($item->toArray(), 4) as $chunk)
		    <div class="row">
		        @foreach($chunk as $data)
		            <div class="col-sm">
		                <div class="card text-center border-dark mt-2 mb-2 pt-3">
						  <img src="/mobileshop/storage/app/public/image/{{ $data->name }}" class="card-img-top mx-auto" alt="" style="height: 180px; width: auto;">
						  <div class="card-body">
						    <h5 class="card-title">{{ $data->brand }} <br> {{ $data->type }}</h5>
						    <p class="card-text">
						    	Color: {{ $data->color }} <br> 
						    	Weight: {{ $data->weight }} <br> 
						    	Screen size: {{ $data->screen_size }} <br>
						    	Price: {{ $data->price }} € <br>
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
		@endforeach		

@endsection