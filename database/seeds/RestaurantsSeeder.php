<?php

use App\User;
use Illuminate\Database\Seeder;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurant = new User();
        $restaurant -> name = 'Mamamia Iasi';
        $restaurant -> city_id = 141;
        $restaurant -> role_id = 3;
        $restaurant -> save();

        $restaurant = new User();
        $restaurant -> name = 'Mamamia Constanta';
        $restaurant -> city_id = 88;
        $restaurant -> role_id = 3;
        $restaurant -> save();

        $restaurant = new User();
        $restaurant -> name = 'Mamamia Bucuresti';
        $restaurant -> city_id = 55;
        $restaurant -> role_id = 3;
        $restaurant -> save();

        $restaurant = new User();
        $restaurant -> name = 'Mamamia Craiova';
        $restaurant -> city_id = 93;
        $restaurant -> role_id = 3;
        $restaurant -> save();


        $restaurant = new User();
        $restaurant -> name = 'McDonald\'s Iasi';
        $restaurant -> city_id = 141;
        $restaurant -> role_id = 3;
        $restaurant -> save();

        $restaurant = new User();
        $restaurant -> name = 'McDonald\'s Constanta';
        $restaurant -> city_id = 88;
        $restaurant -> role_id = 3;
        $restaurant -> save();

        $restaurant = new User();
        $restaurant -> name = 'McDonald\'s Bucuresti';
        $restaurant -> city_id = 55;
        $restaurant -> role_id = 3;
        $restaurant -> save();

        $restaurant = new User();
        $restaurant -> name = 'McDonald\'s Craiova';
        $restaurant -> city_id = 93;
        $restaurant -> role_id = 3;
        $restaurant -> save();


        $restaurant = new User();
        $restaurant -> name = 'Time UP Iasi';
        $restaurant -> city_id = 141;
        $restaurant -> role_id = 3;
        $restaurant -> save();

        $restaurant = new User();
        $restaurant -> name = 'Time UP Constanta';
        $restaurant -> city_id = 88;
        $restaurant -> role_id = 3;
        $restaurant -> save();

        $restaurant = new User();
        $restaurant -> name = 'Time UP Bucuresti';
        $restaurant -> city_id = 55;
        $restaurant -> role_id = 3;
        $restaurant -> save();

        $restaurant = new User();
        $restaurant -> name = 'Time UP Craiova';
        $restaurant -> city_id = 93;
        $restaurant -> role_id = 3;
        $restaurant -> save();


        $restaurant = new User();
        $restaurant -> name = 'Samin Iasi';
        $restaurant -> city_id = 141;
        $restaurant -> role_id = 3;
        $restaurant -> save();

        $restaurant = new User();
        $restaurant -> name = 'Samin Constanta';
        $restaurant -> city_id = 88;
        $restaurant -> role_id = 3;
        $restaurant -> save();

        $restaurant = new User();
        $restaurant -> name = 'Samin Bucuresti';
        $restaurant -> city_id = 55;
        $restaurant -> role_id = 3;
        $restaurant -> save();

        $restaurant = new User();
        $restaurant -> name = 'Samin Craiova';
        $restaurant -> city_id = 93;
        $restaurant -> role_id = 3;
        $restaurant -> save();
    }
}
