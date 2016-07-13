<a href="{{ action('ItemController@getIndex') }}">List Items</a> | 
<a href="{{ action('ItemController@getAdd') }}">Add New Item</a> 

@if(isset($item->id))
	| <a href="{{ action('ItemController@getShow', $item->id) }}">Show this Item</a> | 
	 <a href="{{ action('ItemController@getEdit', $item->id) }}">Edit this Item</a> | 
	 <a href="{{ action('ItemController@getDelete', $item->id) }}">Delete this Item</a> 
@endif