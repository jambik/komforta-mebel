<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    protected $items = [

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0, $iMax=count($this->items); $i<$iMax; $i++)
        {
            $row = array_combine(['name', 'category_id', 'price', 'material', 'brief', 'text', 'available', 'title', 'keywords', 'description', 'image'], $this->items[$i]);

            Product::create($row);
        }
    }
}
