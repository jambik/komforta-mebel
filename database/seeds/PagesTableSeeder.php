<?php

use App\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    protected $items = [

        ['О нас', '<p>Страничка о нас.</p>', 'О нас', 'о, нас', 'Страница которая о нас'],
        ['Контакты', '<p>Страничка контакты.</p>', 'Контакты', 'контакты', 'Страница с контактами'],
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
            $row = array_combine(['name', 'text', 'title', 'keywords', 'description'], $this->items[$i]);

            Page::create($row);
        }
    }
}
