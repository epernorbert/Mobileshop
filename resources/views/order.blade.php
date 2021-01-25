@extends('master')


@section('title', 'Order Page')


@section('content')
	
	
	<!-- Ordered items -->

	<h1 class="mt-2">Ordered Items</h1>

	<div class="table-responsive"> 
		<table class="table table-bordered table-hover text-center">
		    <thead class="thead-dark">
		    	<tr>
		      		<th class="align-middle" scope="col">#</th>
		      		<th class="align-middle" scope="col">Name of Product</th>
		      		<th class="align-middle" scope="col">Quantity</th>			      				      
		      		<th class="align-middle" scope="col">Price</th>			      				      		      					      
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
				      		<td class="align-middle">{{ $result['quantity'] }}</td>
							<td class="align-middle">{{ $result['price']*$result['quantity'] }} €</td>

							@php																
								$i++;
								$fullPrice = $fullPrice + $result['price']*$result['quantity'];
							@endphp
												
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
	</div>


	<!-- Billing details -->

	<h2 style="font-size: 36px;">Billing details</h2>

	<div class="table-responsive mb-5"> 
		<table class="table table-bordered table-hover text-center">
		    <thead class="thead-dark">
		    	<tr>
		      		<th class="align-middle" scope="col">City</th>
		      		<th class="align-middle" scope="col">Post code</th>
		      		<th class="align-middle" scope="col">Street</th>			      				      
		      		<th class="align-middle" scope="col">House number</th>			      				      		      					      
		      		<th class="align-middle" scope="col">Mobile number</th>			      				      		      					      
		    	</tr>

		    	@foreach($billingData as $value)

		    		<tbody>
		    			<tr>
		    				<td class="align-middle" scope="row">{{ $value->city }}</td>
		    				<td class="align-middle">{{ $value->post_code }}</td>
		    				<td class="align-middle">{{ $value->street }}</td>
		    				<td class="align-middle">{{ $value->house_number }}</td>
		    				<td class="align-middle">{{ $value->mobile_number }}</td>
		    			</tr>
		    		</tbody>						

				@endforeach	


		    </thead>
		</table>		
	</div>

	<div class="col-xl-3 p-0">
		<form action="{{ route('order.complete') }}" method="post">
			@csrf

			<!-- @foreach($cart as $key => $result)
				<input type="hidden" name="product_id[]" value="{{ $result['id'] }}">
				<input type="hidden" name="quantity[]" value="{{ $result['quantity'] }}">
			@endforeach	 -->		
			<button type="submit" class="btn btn-primary btn-block btn-lg">Order complete</button>
		</form>
	</div>


@endsection