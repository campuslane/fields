@extends('layouts.main')

@section('title', 'Items')

@section('content')

	@include('items.menu')

	<h1>Items</h1>
	
	<div class="row">
		<div class="col-lg-6">
			
			@foreach($items as $item)
				<a href="{{ action('ItemController@getEdit', $item->id) }}">{{ $item->title }} | {{ $item->field('color') }}</a> <br>
			@endforeach

		</div>
	</div>

@endsection