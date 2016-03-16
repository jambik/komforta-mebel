<?php

use App\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    protected $items = [

        ['О нас', '<p>Страничка о нас.</p>'],
        ['Контакты', '<p>Страничка контакты.</p>'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->delete();

        for($i=0, $iMax=count($this->items); $i<$iMax; $i++)
        {
            $row = array_combine(['title', 'text'], $this->items[$i]);

            Page::create($row);
        }
    }
}
