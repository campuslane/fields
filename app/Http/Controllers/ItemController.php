<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Item;
use App\Models\Option;
use App\Models\Field;

class ItemController extends Controller
{
    protected $types;

    public function __construct()
    {
        $item = new Item;
        $this->types = unserialize(Option::first()->items);
    }

    public function getIndex()
    {
        $types = $this->types;

        return view('items.index', compact('types'));
    }
    
    public function getType($type)
    {
        
    	$items = Item::with('fields')->where('type', $type)->get();

    	return view('items.type', compact('items'));
    }


    public function getAdd($type = '')
    {
        if (! $type) {
            return $this->getTypeSelect();
        }
    	$item = new Item;
        $fields = $this->types[$type]['fields'];

    	return view('items.add', compact('item', 'fields', 'type'));
    }

    public function getTypeSelect()
    {
        $types = $this->types;

        return view('items.select_type', compact('types'));
    }

    public function postCreate(Request $request)
    {
    	$item = Item::create([
				'title' => $request->title, 
				'content' => $request->content, 
                'type' => $request->type, 
                'slug' => str_slug($request->title), 
			]);

        
        $fields = $this->types[$request->type]['fields'];

        foreach($request->all() as $field => $value) {

            if( $field !== 'title' and $field !== 'content' and array_key_exists($field, $fields) ) {
                $item->fields()->create([
                        'name' => $field, 
                        'value' => $value,
                    ]);
            }
        }

    	return redirect()->action('ItemController@getShow', $item->id)->with('message', 'New Item Added');
    }

    public function getEdit($id)
    {
    	$item = Item::findOrFail($id);

        $fields = $this->types[$item->type]['fields'];

        $type = $item->type;

        return view('items.edit', compact('item', 'fields', 'type'));
    }

    public function postUpdate(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update([
                'title' => $request->title, 
                'content' => $request->content, 
            ]);

       
        $fields = $this->types[$request->type]['fields'];

        foreach($request->all() as $field => $value) {

            if( $field !== 'title' and $field !== 'content' and array_key_exists($field, $fields) ) {

                $existing = $item->fields()->where('name', $field)->first();

                if($existing) {
                    $existing->value = $value;
                    $existing->save();
                } else {
                    $item->fields()->create([
                        'name' => $field, 
                        'value' => $value, 
                    ]);
                }
            }
        }

    	return redirect()->action('ItemController@getShow', $id)->with('message', 'Item Updated');
    }

    public function getShow($id)
    {
    	$item = Item::with('fields')->findOrFail($id);

        $fields = $this->types[$item->type]['fields'];

    	return view('items.show', compact('item', 'fields'));
    }

    public function getDelete($id)
    {
    	$item = Item::findOrFail($id);

        return view('items.delete', compact('item'));
    }

    public function postDelete($id)
    {
    	$item = Item::findOrFail($id);
        $item->delete();
        Field::where('item_id', $id)->delete();

        return redirect()->action('ItemController@getIndex')->with('message', 'Item Deleted');
    }

}
