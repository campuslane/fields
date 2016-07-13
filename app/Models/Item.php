<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $guarded = ['id'];

    public function fields()
    {
    	return $this->hasMany(Field::class);
    }

    public function field($name)
    {
    	if(config('fields.' . $name . '.multiple') === true) {

    		$output = [];
    		
    		if( $this->fields ) {
    			
    			foreach( $this->fields()->where('name', $name)->get() as $field ) {
    				$output[] = $field->value;
    			}
    		}

    		return $output;
    	} 

    	if( $this->fields->where('name', $name)->first() ) {
    		return $this->fields->where('name', $name)->first()->value;
    	}

    	return '';
    }
}
