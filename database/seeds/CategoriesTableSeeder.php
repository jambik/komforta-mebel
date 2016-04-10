<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    protected $items = [
        [1, 'Шкафы-купе', null, 'Шкафы-купе', 'Шкафы, купе', 'Шкафы-купе', '<p>Страница Шкафы-купе.</p>', ''],
        [2, 'Кухни', null, 'Кухни', 'Кухни', 'Кухни', '<p>Страница Кухни.</p>', ''],
        [3, 'Гостинные', null, 'Гостинные', 'Гостинные', 'Гостинные', '<p>Страница Гостинные.</p>', ''],
        [4, 'Детские', null, 'Детские', 'Детские', 'Детские', '<p>Страница Детские.</p>', ''],
        [5, 'Мойки', null, 'Мойки', 'Мойки', 'Мойки', '<p>Страница Мойки.</p>', ''],
        [6, 'Техника', null, 'Техника', 'Техника', 'Техника', '<p>Страница Техника.</p>', ''],
        [7, 'Травертин', null, 'Травертин', 'Травертин', 'Травертин', '<p>Страница Травертин.</p>', ''],
        [8, 'Оникс', null, 'Оникс', 'Оникс', 'Оникс', '<p>Страница Оникс.</p>', ''],
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
            $row = array_combine(['id', 'name', 'parent_id', 'title', 'keywords', 'description', 'about', 'image'], $this->items[$i]);

            Category::create($row);
        }
    }
}
