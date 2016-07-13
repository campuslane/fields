<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Models\Item;
use App\Models\Option;

Route::controller('items', 'ItemController');

Route::get('/', function () {

	$options = Option::select('items')->first();

	$items = unserialize($options->items);

	return view('items.index', compact('items'));
    
	$items = Item::with('fields')->get();

	$items = Item::with('fields')->whereHas('fields', function($query){
		$query->where('name', 'color')->where('value', 'Blue')->orWhere('value', 'Orange');
	})->get();

	

	foreach($items as $item) {

		echo '<h1>' . $item->title . '</h1>';
		echo '<p>' . $item->content . '</p>';
		echo 'Color: ';
		$color = '';
		foreach($item->field('color') as $value) {
			$color .= $value . ', ';
		}

		echo trim($color, ', ');

		echo ' Size: ' . $item->field('size');
	}

});
