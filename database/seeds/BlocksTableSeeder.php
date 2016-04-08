<?php

use Illuminate\Database\Seeder;
use App\Block;

class BlocksTableSeeder extends Seeder
{
    protected $items = [

        ['description', 'Описание сайта в шапке', '<p>Описание сайта в шапке.</p>'],
        ['footer', 'Текст снизу', '<p>Текст снизу.</p>'],

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
            $row = array_combine(['alias', 'title', 'text'], $this->items[$i]);

            Block::create($row);
        }
    }
}
