<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([

            'from_id' => 1,
            'to_id' => 2,
            'content' => 'hola, que tal!',
        ]);

        Message::create([

            'from_id' => 2,
            'to_id' => 1,
            'content' => 'Muy bien! xD',
        ]);

        Message::create([

            'from_id' => 1,
            'to_id' => 3,
            'content' => 'hay tarea.?',
        ]);

        Message::create([

            'from_id' => 3,
            'to_id' => 1,
            'content' => 'creo que no xD',
        ]);
    }
}
