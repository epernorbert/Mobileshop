@extends('master')


@section('title', 'Cart Page')


@section('content')
	
	<h2>List of cart items</h2>	
	
	<!-- @if(isset($cart))
		@foreach($cart as $key => $result)

			{{ $result['brand'] }}
			{{ $result['type'] }}
			{{ $result['color'] }}
			{{ $result['weight'] }} Gram
			{{ $result['screen_size'] }} Inch | 						
			Mennyiség: {{$result['quantity']}}			

			<form method="post" action="{{ route('cart.quantityAdd') }}" style="display: inline-block;">
				@csrf	
				<input type="hidden" name="key" value="{{ $key }}">								
				<button>+</button>								
			</form>

			<form method="post" action="{{ route('remove.item') }}" style="display: inline-block;">
				@csrf					
				<input type="hidden" name="index" value="{{ $key }}">			
				<button type="submit">Remove</button>
			</form>
			<br>

		@endforeach	
	@endif -->


	<div class="container table-responsive mx-0 px-0"> 
		<table class="table table-bordered table-hover text-center">
		    <thead class="thead-dark">
		    	<tr>
		      		<th class="align-middle" scope="col">#</th>
		      		<th class="align-middle" scope="col">Name of Product</th>
		      		<th class="align-middle" scope="col">Quantity</th>			      				      
		      		<th class="align-middle"></th>			      
		    	</tr>
		    </thead>

			@if(isset($cart))
				@foreach($cart as $key => $result)	

					<tbody>
				    	<tr>
				      		<th class="align-middle" scope="row">{{ $key+1 }}</th>
				      		<td class="align-middle">{{ $result['brand'] }} | {{ $result['type'] }}</td>				      
				      		<td class="align-middle">{{ $result['quantity'] }}
				      		
				      			<form method="post" action="{{ route('cart.quantityAdd') }}" style="display: inline-block;">
									@csrf	
									<input type="hidden" name="key" value="{{ $key }}">								
									<button>+</button>								
								</form>
							</td>			      
							<td class="align-middle">
								<form method="post" action="{{ route('remove.item') }}" style="display: inline-block;">
									@csrf					
									<input type="hidden" name="index" value="{{ $key }}">			
									<button type="submit">Remove</button>
								</form>
							</td>
				    	</tr>				    
				    </tbody>

				@endforeach	
			@endif

		</table>
		@if(!empty($cart))
		<a href="{{ route('billing.page') }}">
			<button>Add billing details</button>
		</a>		
	@endif	

	</div>

@endsection