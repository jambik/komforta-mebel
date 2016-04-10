<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(BlocksTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(SlidesTableSeeder::class);
        $this->call(GalleriesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);

        Model::reguard();
    }
}
