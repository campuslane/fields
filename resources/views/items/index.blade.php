@extends('layouts.main')

@section('title', 'Items')

@section('content')

	@include('items.menu')

	<h1>Items</h1>
	
	<div class="row">
		<div class="col-lg-6">
			
			@foreach($types as $key => $type)
				<a href="{{ action('ItemController@getType', $key) }}">{{ $type['name'] }}</a> <br>
			@endforeach

		</div>
	</div>

@endsection