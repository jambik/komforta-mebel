<?php

use App\Product;
use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
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
            $row = array_combine(['title', 'text', 'url', 'image'], $this->items[$i]);

            Product::create($row);
        }
    }
}
