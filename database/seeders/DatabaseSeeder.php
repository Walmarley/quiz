<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;


class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            RolerSeeder::class,
            UserSeeder::class,
            QuestionsSeeder::class,
        ]);
    }
}
