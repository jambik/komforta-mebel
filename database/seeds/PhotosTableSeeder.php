<?php

use App\Photo;
use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    protected $items = [

        ['', 'product-1-56fb86c8bf59c.jpg', 'products/', 0, 1, 'App\Product'],
        ['Морковный сок', 'product-1-56fb86c8bf599.jpg', 'products/', 0, 1, 'App\Product'],
        ['Грушевый сок', 'product-1-56fb86c9eb8ca.jpg', 'products/', 0, 1, 'App\Product'],
        ['Толкатель и проем', 'product-1-56fb86ca0a005.jpg', 'products/', 0, 1, 'App\Product'],
        ['Свекольный сок', 'product-1-56fb86cb1a355.jpg', 'products/', 0, 1, 'App\Product'],
        ['Яблочный сок', 'product-1-56fb86cb30943.jpg', 'products/', 0, 1, 'App\Product'],
        ['Толкатель и проем', 'product-1-56fb86cc361b5.jpg', 'products/', 0, 1, 'App\Product'],
        ['2 сетки в комплекте', 'product-1-56fb86cc4f877.jpg', 'products/', 0, 1, 'App\Product'],
        ['Толкатель', 'product-1-56fb86cd50e48.jpg', 'products/', 0, 1, 'App\Product'],
        ['Шнек', 'product-1-56fb86cd65300.jpg', 'products/', 0, 1, 'App\Product'],
        ['', 'product-1-56fb86ce71a17.jpg', 'products/', 0, 1, 'App\Product'],
        ['', 'product-1-56fb86ce85015.jpg', 'products/', 0, 1, 'App\Product'],
        ['', 'product-1-56fb86cf96d89.jpg', 'products/', 0, 1, 'App\Product'],
        ['Дынный сок', 'product-1-56fb86cfa8d26.jpg', 'products/', 0, 1, 'App\Product'],
        ['Гранатовый сок', 'product-1-56fb86d0bb54a.jpg', 'products/', 0, 1, 'App\Product'],
        ['Сливовый сок', 'product-1-56fb86d0d1103.jpg', 'products/', 0, 1, 'App\Product'],

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
            $row = array_combine(['name', 'image', 'img_url', 'order', 'photoable_id', 'photoable_type'], $this->items[$i]);

            Photo::create($row);
        }
    }
}
