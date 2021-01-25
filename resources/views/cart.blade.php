@extends('master')

@section('title', 'Cart Page')

@section('content')
	
	
	<!-- Cart items -->

	<h1 class="mt-2">List of cart items</h1>		


	<div class="table-responsive"> 
		<table class="table table-bordered table-hover text-center">
		    <thead class="thead-dark">
		    	<tr>
		      		<th class="align-middle" scope="col">#</th>
		      		<th class="align-middle" scope="col">Name of Product</th>
		      		<th class="align-middle" scope="col">Quantity</th>			      				      
		      		<th class="align-middle" scope="col">Price</th>			      				      
		      		<th class="align-middle"></th>			      
		    	</tr>
		    </thead>

			@if(isset($cart))

				@php
					$fullPrice = 0;
					$i = 1;
				@endphp

				@foreach($cart as $key => $result)						
					<tbody>
				    	<tr>
				      		<th class="align-middle" scope="row">{{ $i }}</th>				      	
				      		<td class="align-middle">
				      			<a href="{{ route('mobile.page', $result['id']) }}">{{ $result['brand'] }} | {{ $result['type'] }}</a>
				      		</td>				      
				      		<td class="align-middle">
				      			{{ $result['quantity'] }}				      		
				      			<form method="post" action="{{ route('cart.quantityAdd') }}" style="display: inline-block;">
									@csrf	
									<input type="hidden" name="key" value="{{ $key }}">								
									<button class="btn btn-secondary">+</button>								
								</form>
							</td>
							<td class="align-middle">{{ $result['price']*$result['quantity'] }} €</td>

							@php								
								$fullPrice =  $fullPrice + $result['price']*$result['quantity'];
								$i++;
							@endphp

							<td class="align-middle">
								<form method="post" action="{{ route('remove.item') }}" style="display: inline-block;">
									@csrf					
									<input type="hidden" name="index" value="{{ $key }}">			
									<button type="submit" class="btn btn-danger">X</button>
								</form>
							</td>						
				    	</tr>				    
				    </tbody>				    
				@endforeach	

				<tr>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td style="background-color: #F21111; color: white; font-weight: 700;">Full price</td>
					<td>{{ $fullPrice }} €</td>
				</tr>				

			@endif

		</table>

		<!-- If not empty shopping cart show Billing details button -->

		@if(!empty($cart))
			<a href="{{ route('billing.page') }}">
				<div class="col-xl-3 p-0">
					<button class="btn btn-primary btn-block btn-lg">Add billing details</button>
				</div>	
			</a>		
		@endif	
	</div>


@endsection