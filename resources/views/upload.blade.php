@extends('master')


@section('title', 'Upload page')


@section('content')

	<form method="post" action="{{ route('upload.mobile') }}" enctype="multipart/form-data">
		@csrf
		<label>Upload new mobile</label><br>
		<input type="text" name="brand" placeholder="Brand" required="" value="{{old('brand')}}"><br>
		@error('brand')
			{{ $message }}<br>
		@enderror
		<input type="text" name="type" placeholder="Type" required="" value="{{old('type')}}"><br>
		@error('type')
			{{ $message }}<br>
		@enderror			
		<input type="text" name="color" placeholder="Color" required="" value="{{old('color')}}"><br>	
		@error('color')
			{{ $message }}<br>
		@enderror
		<input type="text" name="weight" placeholder="Weight (Gram)" required="" value="{{old('weight')}}"><br>
		@error('weight')
			{{ $message }}<br>
		@enderror
		<input type="text" name="screen_size" placeholder="Screen size (Inch)" required="" value="{{old('screen_size')}}"><br>
		@error('screen_size')
			{{ $message }}<br>
		@enderror
		<label for="image">Select images:</label>
		<input type="file" name="image[]" multiple="multiple" accept="image/*"><br>		
		@error('image.*')
			{{ $message }}<br>
		@enderror		
		<button type="submit">Submit</button>				
	</form>

	@if(session()->has('success'))

		<p style="color: green;">{{session()->get('success')}}</p>

	@endif

@endsection