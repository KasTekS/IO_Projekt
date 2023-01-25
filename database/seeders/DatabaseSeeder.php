<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $this->call([
            CennikSeeder::class,
            FilmSeeder::class,
            SalaSeeder::class,
            UserSeeder::class,
            MiejscaSeeder::class,
            SeanseSeeder::class,
            BiletySeeder::class,
        ]);


    }
}
