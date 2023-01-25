<?php

namespace Database\Seeders;

use App\Models\Miejsca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MiejscaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nr'=>1, 'rzad'=>1, 'nr_na_grid'=>1,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>2, 'rzad'=>1, 'nr_na_grid'=>2,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>3, 'rzad'=>1, 'nr_na_grid'=>3,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>4, 'rzad'=>1, 'nr_na_grid'=>4,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>5, 'rzad'=>1, 'nr_na_grid'=>5,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>6, 'rzad'=>1, 'nr_na_grid'=>7,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>7, 'rzad'=>1, 'nr_na_grid'=>8,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>8, 'rzad'=>1, 'nr_na_grid'=>9,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>9, 'rzad'=>1, 'nr_na_grid'=>10,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],

            ['nr'=>1, 'rzad'=>2, 'nr_na_grid'=>1,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>2, 'rzad'=>2, 'nr_na_grid'=>2,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>3, 'rzad'=>2, 'nr_na_grid'=>3,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>4, 'rzad'=>2, 'nr_na_grid'=>4,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>5, 'rzad'=>2, 'nr_na_grid'=>5,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>6, 'rzad'=>2, 'nr_na_grid'=>7,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>7, 'rzad'=>2, 'nr_na_grid'=>8,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>8, 'rzad'=>2, 'nr_na_grid'=>9,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],
            ['nr'=>9, 'rzad'=>2, 'nr_na_grid'=>10,'rodzaj'=>'ulgowy','cennik_id'=>1,'sala_id'=>1],

            ['nr'=>1, 'rzad'=>3, 'nr_na_grid'=>1,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>2, 'rzad'=>3, 'nr_na_grid'=>2,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>3, 'rzad'=>3, 'nr_na_grid'=>3,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>4, 'rzad'=>3, 'nr_na_grid'=>4,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>5, 'rzad'=>3, 'nr_na_grid'=>5,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>6, 'rzad'=>3, 'nr_na_grid'=>7,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>7, 'rzad'=>3, 'nr_na_grid'=>8,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>8, 'rzad'=>3, 'nr_na_grid'=>9,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>9, 'rzad'=>3, 'nr_na_grid'=>10,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],

            ['nr'=>1, 'rzad'=>4, 'nr_na_grid'=>1,'rodzaj'=>'vip','cennik_id'=>3,'sala_id'=>1],
            ['nr'=>2, 'rzad'=>4, 'nr_na_grid'=>2,'rodzaj'=>'vip','cennik_id'=>3,'sala_id'=>1],
            ['nr'=>3, 'rzad'=>4, 'nr_na_grid'=>4,'rodzaj'=>'vip','cennik_id'=>3,'sala_id'=>1],
            ['nr'=>4, 'rzad'=>4, 'nr_na_grid'=>5,'rodzaj'=>'vip','cennik_id'=>3,'sala_id'=>1],
            ['nr'=>5, 'rzad'=>4, 'nr_na_grid'=>7,'rodzaj'=>'vip','cennik_id'=>3,'sala_id'=>1],
            ['nr'=>6, 'rzad'=>4, 'nr_na_grid'=>8,'rodzaj'=>'vip','cennik_id'=>3,'sala_id'=>1],
            ['nr'=>7, 'rzad'=>4, 'nr_na_grid'=>10,'rodzaj'=>'vip','cennik_id'=>3,'sala_id'=>1],

            ['nr'=>1, 'rzad'=>5, 'nr_na_grid'=>1,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>2, 'rzad'=>5, 'nr_na_grid'=>2,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>3, 'rzad'=>5, 'nr_na_grid'=>3,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>4, 'rzad'=>5, 'nr_na_grid'=>4,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>5, 'rzad'=>5, 'nr_na_grid'=>5,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>6, 'rzad'=>5, 'nr_na_grid'=>6,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>7, 'rzad'=>5, 'nr_na_grid'=>7,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>8, 'rzad'=>5, 'nr_na_grid'=>8,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>9, 'rzad'=>5, 'nr_na_grid'=>9,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],
            ['nr'=>10, 'rzad'=>5, 'nr_na_grid'=>10,'rodzaj'=>'normalny','cennik_id'=>2,'sala_id'=>1],



        ];
        Miejsca::insert($data);
    }
}
