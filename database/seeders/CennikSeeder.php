<?php

namespace Database\Seeders;

use App\Models\Cennik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CennikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['cena'=>12, 'nazwa'=>'ulgowy'],
            ['cena'=>15, 'nazwa'=>'normalny'],
            ['cena'=>21, 'nazwa'=>'vip'],


        ];
        Cennik::insert($data);
    }
}
