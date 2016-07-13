@extends('layouts.main')

@section('title', 'Select a Type to Add')

@section('content')

	@include('items.menu')

	<h1>Types</h1>
	
	<div class="row">
		<div class="col-lg-6">
			
			@foreach($types as $key => $type)
				
				<a href="{{ action('ItemController@getAdd', $key) }}">{{ $type['name'] }}</a> <br>
				
			@endforeach

		</div>
	</div>

@endsection