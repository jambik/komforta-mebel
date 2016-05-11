<?php

use Illuminate\Database\Seeder;
use App\Material;

class MaterialsTableSeeder extends Seeder
{
    protected $items = [

        ['Натуральное дерево'],
        ['Пластик'],
        ['МДФ пленка'],
        ['ДСП'],
        ['МДФ эмаль'],
        ['Акрил'],
        ['Натуральный шпон'],

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
            $row = array_combine(['name'], $this->items[$i]);

            Material::create($row);
        }
    }
}
