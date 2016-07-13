@extends('layouts.main')

@section('title', 'Edit Item')

@section('content')

	@include('items.menu')

	<h1>Edit Item</h1>
	
	<div class="row">
		<div class="col-lg-6">
			
			<form action="{{ action('ItemController@postUpdate', $item->id) }}" method="POST">
			
				{!! csrf_field() !!}
				
				@include('items.form')

				<div class="form-group">
					<button class="btn btn-primary">Update</button>
				</div>

			</form>		

		</div>
	</div>

@endsection