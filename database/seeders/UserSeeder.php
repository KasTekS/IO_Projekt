<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['imie'=>'Adam', 'nazwisko'=>'Kowalski', 'rodzaj'=>'admin', 'email'=>'admin@test.pl', 'data_urodzenia'=>'2000-06-19','password'=>Hash::make('adminadmin')],
            ['imie'=>'Jan', 'nazwisko'=>'Nowak', 'rodzaj'=>'user', 'email'=>'user@test.pl', 'data_urodzenia'=>'2000-06-18','password'=>Hash::make('useruser')],
            ['imie'=>'Sandra', 'nazwisko'=>'Kolwalkiewicz', 'rodzaj'=>'user', 'email'=>'user1@test.pl', 'data_urodzenia'=>'1999-06-19','password'=>Hash::make('useruser')],

        ];
        User::insert($data);
    }
}
