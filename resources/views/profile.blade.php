@extends('master')

@section('title', 'Profile Page')

@section('content')	


	<!-- Personal data -->

	<div class="container m-0 mt-3">
		<div class="row">			

			<div class="col-md-4 p-0"> 
				<table class="table table-bordered table-hover text-center" style="background-color: grey;">
				<h2 class="text-center">Personal data</h2>	
					<tbody>		    
				    	<tr>
				      		<th class="align-middle" scope="col">First name</th>
				      		<th class="align-middle" scope="col">{{ Auth::user()->fname }}</th>	      					      				      		      				     
				    	</tr>
				    	<tr>
				      		<th class="align-middle" scope="col">Last name</th>
				      		<th class="align-middle" scope="col">{{ Auth::user()->lname }}</th>	      					      				      		      				     
				    	</tr>	
				    	<tr>
				      		<th class="align-middle" scope="col">Username</th>
				      		<th class="align-middle" scope="col">{{ Auth::user()->uname }}</th>	      					      				      		      				     
				    	</tr>
				    	<tr>
				      		<th class="align-middle" scope="col">Registration date</th>
				      		<th class="align-middle" scope="col">{{ Auth::user()->created_at }}</th>	      					      				      		      				     
				    	</tr>	    													    					   
				    </tbody>				    
				</table>
			</div>

			<div class="col-2"></div>

			<!-- Billing details -->			
			
			@foreach($billingData as $value)		
				<div class="col-md-4 p-0"> 
					<table class="table table-bordered table-hover text-center" style="background-color: grey;">	
						<tbody>	
							<h2 class="text-center">Billing details</h2>		    
					    	<tr>
					      		<th class="align-middle" scope="col">City</th>
					      		<th class="align-middle" scope="col">{{ $value->city }}</th>	      					      				      		      				     
					    	</tr>
					    	<tr>
					      		<th class="align-middle" scope="col">Post code</th>
					      		<th class="align-middle" scope="col">{{ $value->post_code }}</th>	      					      				      		      				     
					    	</tr>	
					    	<tr>
					      		<th class="align-middle" scope="col">Street</th>
					      		<th class="align-middle" scope="col">{{ $value->street }}</th>	      					      				      		      				     
					    	</tr>
					    	<tr>
					      		<th class="align-middle" scope="col">House number</th>
					      		<th class="align-middle" scope="col">{{ $value->house_number }}</th>	      					      				      		      				     
					    	</tr>
					    	<tr>
					      		<th class="align-middle" scope="col">Mobile number</th>
					      		<th class="align-middle" scope="col">{{ $value->mobile_number }}</th>	      					      				      		      				     
					    	</tr>	    													    					   
					    </tbody>				    
					</table>
				</div>
			@endforeach

		</div>
	</div>


	<!-- Orders -->

	<!-- Succes alert -->

	@if(session()->has('successOrder'))
		<div class="alert alert-success d-flex justify-items-center" role="alert">
		    <som-icon name="icon-confirm-button" class="icon-lg my-auto"></som-icon>
		    <b class="pl-3 my-2">{{ session()->get('successOrder') }}</b>
		</div>
	@endif

	<h2>Orders</h2>

	<div class="col p-0"> 
		<table class="table table-bordered table-hover text-center">	
			<thead class="thead-dark">
				<tr>
					<th class="align-middle" scope="col">#</th>
					<th class="align-middle" scope="col">Product Name</th>
					<th class="align-middle" scope="col">Quantity</th>
					<th class="align-middle" scope="col">Order date</th>
				</tr>
			</thead>
			<tbody>	
				@foreach($orders as $key => $value)	    
			    	<tr>		    		
			      		<td class="align-middle" scope="col">{{ $key+1 }}</td>
			      		<td class="align-middle" scope="col">{{ $value->brand }} | {{ $value->type }}</td>	      					      				      		      				     
			      		<td class="align-middle" scope="col">{{ $value->quantity }}</td>
			      		<td class="align-middle" scope="col">{{ $value->created_at }}</td>
			    	</tr>		    		    										
		    	@endforeach				    					  
		    </tbody>				    
		</table>
	</div>


@endsection