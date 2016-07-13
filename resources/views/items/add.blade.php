@extends('layouts.main')

@section('title', 'Add a New Item')

@section('content')

	@include('items.menu')

	<h1>Add a New Item</h1>
	
	<div class="row">
		<div class="col-lg-6">
			
			<form action="{{ action('ItemController@postCreate') }}" method="POST">
			
				{!! csrf_field() !!}
				
				@include('items.form')

				

				<div class="form-group">
					<button class="btn btn-primary">Add</button>
				</div>

			</form>		

		</div>
	</div>

@endsection