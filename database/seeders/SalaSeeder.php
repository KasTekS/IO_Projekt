<?php

namespace Database\Seeders;

use App\Models\Sala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
           ['ilosc_rzedow'=>5, 'ilosc_miejsc'=>43, 'ekran'=>'40 m × 30 m'],


       ];
       Sala::insert($data);
    }
}
