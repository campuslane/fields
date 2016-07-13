@extends('layouts.main')

@section('title', $item->title)

@section('content')

	@include('items.menu')

	<h1>{{ $item->title }}</h1>
	
	<p>{{ $item->content }}</p>

	<p><strong>Color</strong>: {{ $item->field('color') }}</p>
	<p><strong>Size</strong>: {{ $item->field('size') }}</p>

	@foreach($fields as $field)
		
	@endforeach

@endsection