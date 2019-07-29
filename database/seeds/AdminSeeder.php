<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'alexserb2009@yahoo.com';
        $user->password = bcrypt('password');
        $user->role_id = 2;
        $user->save();
    }
}
