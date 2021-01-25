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

		<input type="text" name="screen_resolution" placeholder="Screen resolution" required="" value="{{old('screen_resolution')}}"><br>
		<input type="text" name="screen_type" placeholder="Screen type" required="" value="{{old('screen_type')}}"><br>
		<input type="number" name="main_camera" placeholder="Main camera" required="" value="{{old('main_camera')}}"><br>
		<input type="number" name="selfie_camera" placeholder="Selfie camera" required="" value="{{old('selfie_camera')}}"><br>
		<input type="text" name="os" placeholder="Os" required="" value="{{old('os')}}"><br>
		<input type="number" name="memory" placeholder="Memory" required="" value="{{old('memory')}}"><br>
		<input type="text" name="gpu" placeholder="Gpu" required="" value="{{old('gpu')}}"><br>
		<input type="text" name="cpu" placeholder="Cpu" required="" value="{{old('cpu')}}"><br>
		<input type="number" name="battery" placeholder="Battery" required="" value="{{old('battery')}}"><br>
		<input type="number" name="price" placeholder="Price" required="" value="{{old('price')}}"><br>

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