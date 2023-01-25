<?php

namespace Database\Seeders;

use App\Models\Bilety;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiletySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['cena'=>15, 'user_id'=>1, 'sean_id'=>1, 'miejsca_id'=>1],
            ['cena'=>15, 'user_id'=>1, 'sean_id'=>1, 'miejsca_id'=>2],
            ['cena'=>15, 'user_id'=>1, 'sean_id'=>1, 'miejsca_id'=>8],
            ['cena'=>15, 'user_id'=>1, 'sean_id'=>1, 'miejsca_id'=>9],



        ];
        Bilety::insert($data);
    }
}
