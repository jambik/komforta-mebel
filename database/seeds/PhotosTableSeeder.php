<?php

use App\Photo;
use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
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
            $row = array_combine(['name', 'image', 'img_url', 'order', 'photoable_id', 'photoable_type'], $this->items[$i]);

            Photo::create($row);
        }
    }
}
