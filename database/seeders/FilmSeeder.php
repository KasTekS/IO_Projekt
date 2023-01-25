<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['tytul'=>'DOKTOR STRANGE W MULTIWERSUM OBŁĘDU', 'data_premiery'=>'2022-05-06', 'kategoria'=>'fantastyka','czas_trwania'=>'127 minut','kategoria_wiekowa'=>'13+'
            ,'czy_jest_grany'=>1,  'okladka_link' => ('/img/doktor.jpg'),
                'duze_zdj_link' =>  '/img/doktor.jpg','opis'=>'W najnowszym filmie Marvel Studios „Doktor Strange multiwersum obłędu” MCU otwiera multiwersum, przesuwając jego granice w nieodkryte dotąd rejony. Doktor Strange, z pomocą dawnych i nowych sojuszników, przemierza niesamowite i pełne niebezpieczeństw alternatywne światy multiwersum, by stawić czoła nowemu tajemniczemu przeciwnikowi.'],
            ['tytul'=>'SONIC 2. SZYBKI JAK BŁYSKAWICA', 'data_premiery'=>'2022-04-22', 'kategoria'=>'bajka','czas_trwania'=>'123 minut','kategoria_wiekowa'=>'13+'
            ,'czy_jest_grany'=>1,  'okladka_link' => '/img/sonic.png',
                'duze_zdj_link' =>  '/img/sonic.png','opis'=>'Uwielbiany na całym świecie niebieski jeż powraca w kolejnej odsłonie filmu przygodowego „Sonic 2.Szybki jak błyskawica”. Po osiedleniu się w Green Hills, Sonic chce udowodnić, że ma to, czego potrzeba, aby być prawdziwym bohaterem.']
    ,['tytul'=>'TOP GUN: MAVERICK', 'data_premiery'=>'2022-05-27', 'kategoria'=>'akcja','czas_trwania'=>'130 minut','kategoria_wiekowa'=>'13+'
            ,'czy_jest_grany'=>1,  'okladka_link' => '/img/top.jpg',
                'duze_zdj_link' =>  '/img/top.jpg','opis'=>'Po ponad 30 latach w służbie amerykańskiej marynarce wojennej, Pete „Maverick” Mitchell (Tom Cruise) jest tam, gdzie powinien być – na szczycie. Jest mistrzowskim pilotem, testującym najnowocześniejsze maszyny. Staje na czele pilockiej spec-grupy szkolącej jej uczestników do udziału w misji, jakiej dotąd nie było.']


        ];
        Film::insert($data);
    }
}
