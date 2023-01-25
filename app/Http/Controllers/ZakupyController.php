<?php

namespace App\Http\Controllers;

use App\Models\Bilety;
use App\Models\Film;
use App\Models\Komentarze;
use App\Models\Miejsca;
use App\Models\Sala;
use App\Models\Seans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ZakupyController extends Controller
{
    public function miejsca($seansId):View
    {
        $seans = Seans::where('id', '=', $seansId)->get()[0];
        $sala = Sala::where('id', '=', $seans->sala_id)->get()[0];
        $bilety = Bilety::where('sean_id', '=', $seansId)->get();
        $ilerzedow = Miejsca::
    select(DB::raw('max(rzad) as max'))
        ->where('sala_id', '=', $sala->id)

        ->get()[0];

        $max =Miejsca::select(DB::raw('max(nr_na_grid) as max'))
            ->where('sala_id', '=', $sala->id)

            ->get()[0];


    $miejsca = Miejsca::where('sala_id', '=', $sala->id)->get();

        return view('kino.zakup.miejsce', ['sala' => $sala,
        'statrzedow' =>$ilerzedow,
            'ilerzedow' =>$ilerzedow,
            'max' =>$max,
        'miejsca'=>$miejsca,
        'seans'=>$seans,
            'bilety'=>$bilety

        ]);
    }
    public function film($filmID):View
    {

        $film = Film::where('id', '=', $filmID)->get()[0];

        $seanse=Seans::where('data_seansu', '>=', Carbon::now())->where('film_id', '=', $filmID)->orderByRaw('data_seansu')->paginate(3);
        return view('kino.zakup.film', [
            'film' => $film,

            'seanse'=>$seanse
        ]);
    }
    public function podsumowanie(Request $request,$seans):View
    {
        $seanse=Seans::where('id', '=', $seans)->get()[0];
            $miejscatab=$request->get('miejsca');
        $listamiejsc = array();
        $dozaplaty =0;

            foreach ($miejscatab as $miejsce){
                $aa =Miejsca::where('id', '=', $miejsce)->get()[0];
                array_push($listamiejsc,$aa);
                $dozaplaty+=$aa->cennik->cena;
            }

        return view('kino.zakup.podsumowanie', [
            'miejsca' => $listamiejsc,
            'seans' => $seanse,
            'do_zaplaty' => $dozaplaty,

        ]);
    }
}
