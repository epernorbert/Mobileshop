@extends('master')


@section('title', 'Seach Result Page')


@section('content')
	
	<h2>Search result</h2>

	<div>
	@foreach( $query as $querys)

		<a href="{{ route('mobile.page', $querys->id) }}">
		{{ $querys->brand }}
		{{ $querys->type }}
		{{ $querys->color }}<br>	

	@endforeach
	<div>

@endsection