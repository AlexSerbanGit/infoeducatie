<?php

use Illuminate\Database\Seeder;
use App\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City;
        $city->name = 'Iasi';
        $city->save();

        $city = new City;
        $city->name = 'Focsani';
        $city->save();

        $city = new City; 
        $city->name = 'Bucuresti';
        $city->save();
    }
}
