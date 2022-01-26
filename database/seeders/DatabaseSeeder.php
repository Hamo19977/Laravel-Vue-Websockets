<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(15)->create();
        \App\Models\Message::factory(100)->create();
        \App\Models\Comment::factory(100)->create();
        \App\Models\Room::factory(5)->create();
    }
}
