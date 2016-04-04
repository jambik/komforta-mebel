<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    protected $items = [
        ['Статья 1', '<p>Текст статьи 1.</p>', 'Статья 1', 'статья, 1', 'Первая статья'],
        ['Статья 2', '<p>Текст статьи 2.</p>', 'Статья 2', 'статья, 2', 'Вторая статья'],
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

            Article::create($row);
        }
    }
}
