@extends('layouts.main')

@section('title', 'Edit Item')

@section('content')

	@include('items.menu')

	<h1>Delete Item</h1>
	
	<div class="row">
		<div class="col-lg-6">
			
			<form action="{{ action('ItemController@postDelete', $item->id) }}" method="POST">
			
				{!! csrf_field() !!}
				
				<p>Are you sure you want to delete the item:  <strong>{{ $item->title }}</strong>?</p>

				<div class="form-group">
					<button class="btn btn-danger" type="submit">Yes, Delete it</button> 
					<a href="" class="btn btn-default">No, Please Cancel</a> 
				</div>

			</form>		

		</div>
	</div>

@endsection