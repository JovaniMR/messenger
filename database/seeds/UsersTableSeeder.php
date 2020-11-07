<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'Jovani',
           'email' => 'jovani@gmail.com',
           'password' => bcrypt('123')
        ]);

        User::create([
            'name' => 'Eduardo',
            'email' => 'eduardo@gmail.com',
            'password' => bcrypt('123')
         ]);

         User::create([
            'name' => 'Juan Perez',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('123')
         ]); 
    }
}
