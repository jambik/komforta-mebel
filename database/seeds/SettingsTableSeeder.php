<?php

use App\Settings;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = new Settings();
        $settings->email       = 'jambik@gmail.com';
        $settings->phone       = '+79034297801';
        $settings->address     = 'г. Москва, ул. Ленина, дом 1';
        $settings->description = '<p>Описание сайта</p>';
        $settings->save();
    }
}
