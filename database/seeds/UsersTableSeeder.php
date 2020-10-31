<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::crete([
           'name' => 'Jovani',
           'email' => 'armando@gmail.com',
           'password' => bcrypt('123')
        ]);
    }
}
