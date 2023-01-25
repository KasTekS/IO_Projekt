<?php

namespace Database\Seeders;

use App\Models\Seans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeanseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['data_seansu'=>'2023-02-13 20:00:00', 'rodzaj'=>'2D', 'glos'=>'lektor', 'film_id'=>'1', 'sala_id'=>'1'],
            ['data_seansu'=>'2023-02-12 20:00:00', 'rodzaj'=>'2D', 'glos'=>'lektor', 'film_id'=>'3', 'sala_id'=>'1'],
            ['data_seansu'=>'2023-02-13 20:00:00', 'rodzaj'=>'3D', 'glos'=>'napisy', 'film_id'=>'1', 'sala_id'=>'1'],
            ['data_seansu'=>'2023-02-13 20:00:00', 'rodzaj'=>'2D', 'glos'=>'dubbing', 'film_id'=>'2', 'sala_id'=>'1'],


        ];
        Seans::insert($data);
    }
}
