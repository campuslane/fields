<?php

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Field;
use App\Models\Option;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ItemSeeder::class);
        $this->call(FieldSeeder::class);
        $this->call(OptionSeeder::class);
    }
}


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::truncate();

        $data = [
        	[
        		'title' => 'First Item',
                'type' => 'posts', 
        		'content' => 'This is the first item', 
        		'slug' => 'first-item', 
        	], 
        	[
        		'title' => 'Second Item',
                'type' => 'posts',
        		'content' => 'This is the second item', 
        		'slug' => 'second-item', 
        	], 
        	[
        		'title' => 'Third Item',
                'type' => 'posts',
        		'content' => 'This is the third item', 
        		'slug' => 'third-item', 
        	], 
        ];

        Item::insert($data);
    }
}

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Field::truncate();

        $data = [
        	[
        		'item_id' => 1,
        		'name' => 'color', 
        		'value' => 'Red', 
        	], 

            [
                'item_id' => 1,
                'name' => 'color', 
                'value' => 'Purple', 
            ], 

            [
                'item_id' => 1,
                'name' => 'size', 
                'value' => 'Large', 
            ], 

        	[
        		'item_id' => 2,
        		'name' => 'color', 
        		'value' => 'White', 
        	], 
            [
                'item_id' => 2,
                'name' => 'color', 
                'value' => 'Orange', 
            ], 
        	[
        		'item_id' => 3,
        		'name' => 'color', 
        		'value' => 'Blue', 
        	], 
        	
        ];

        field::insert($data);
    }
}

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::truncate();

        
        $post_fields =  [

            'color' => [
                'name' => 'color', 
                'label' => 'Color', 
                'instructions' => 'Add a Color', 
                'element' => 'text', 
            ], 

            'size' => [
                'name' => 'size', 
                'label' => 'Size', 
                'instructions' => 'Add a Size', 
                'element' => 'text', 
            ], 


        ];

        $employee_fields =  [

            'age' => [
                'name' => 'age', 
                'label' => 'Age', 
                'instructions' => 'Enter your Age', 
                'element' => 'text', 
            ], 

            'birthplace' => [
                'name' => 'birthplace', 
                'label' => 'Birthplace', 
                'instructions' => 'Enter your Birthplace', 
                'element' => 'text', 
            ], 


        ];

        $options = [

            'posts' => [

                'name' => 'Blog Posts', 
                'slug' => 'posts', 
                'fields' => $post_fields, 

            ], 

            'employees' => [

                'name' => 'Employees', 
                'slug' => 'employees', 
                'fields' => $employee_fields, 

            ], 

        ];


        $options = serialize($options);

        Option::create([
                'items' => $options, 
            ]);
    }
}