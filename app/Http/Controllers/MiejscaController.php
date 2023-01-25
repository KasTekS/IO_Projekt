<?php

namespace App\Http\Controllers;

use App\Enums\RodzajMiejsca;
use App\Models\Cennik;
use App\Models\Miejsca;
use App\Models\Sala;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;

class MiejscaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($salaId):View
    {
        $sala = Sala::where('id', '=', $salaId)->get()[0];
        $ilerzedow = Miejsca::
        select(DB::raw('max(rzad) as max'))
            ->where('sala_id', '=', $salaId)

            ->get()[0];

        $max =Miejsca::select(DB::raw('max(nr_na_grid) as max'))
            ->where('sala_id', '=', $salaId)

            ->get()[0];

        $miejsca = Miejsca::where('sala_id', '=', $salaId)->get();

        return view('admin.miejsca.index', ['sala' => $sala,

            'ilerzedow' =>$ilerzedow,
            'max' =>$max,
            'miejsca'=>$miejsca,
            'cennik'=>Cennik::all(),
            'sala'=>Sala::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        return view('admin.miejsca.create',[

            'cennik'=>Cennik::all(),
            'sala'=>Sala::all()

        ]);
    }
    public function dodaj(Request $request):View
    {
        return view('admin.miejsca.dodaj',[
            'rzad'=>$request->rzad,
            'kolumna'=>$request->kolumna,
            'salaa'=>$request->sala,

            'cennik'=>Cennik::all(),
            'sala'=>Sala::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request):RedirectResponse
    {

        $mi = Miejsca::where('nr', '=', $request->nr)->where('rzad', '=', $request->rzad)->where('sala_id', '=', $request->sala_id)->get();

        if(count($mi) != 0) {
            return redirect(route('miejsca.create'))->with('error', 'Taki numer miejsca w tym rzedzie juz istnieje');
        }
        $mi = Miejsca::where('nr_na_grid', '=', $request->nr_na_grid)->where('rzad', '=', $request->rzad)->where('sala_id', '=', $request->sala_id)->get();

        if(count($mi) != 0) {
            return redirect(route('miejsca.create'))->with('error', 'Miejsce z takim Współrzędnymi już istnieje');
        }

        $cena = Cennik::where('id', '=', $request->cennik_id)->get()[0];
        if($request->rodzaj!=$cena->nazwa)
        {
            return redirect(route('miejsca.create'))->with('error', 'Wyświetlana cena nie jest taka sama jak przdzielona cena z cenika');
        }


        $validated = $request->validate([

            'nr' => ['required', 'numeric', 'max:30','min:0'],
            'nr_na_grid' => ['required', 'numeric', 'max:30','min:0'],
            'rzad' => ['required', 'numeric', 'max:15','min:0'],
            'rodzaj'=>['required',new Enum(RodzajMiejsca::class)],
            'cennik_id'=>['required', 'numeric'],
            'sala_id'=>['required', 'numeric'],

        ]);



        $miejsce =    Miejsca::create([
            'nr' => $request['nr'],
            'nr_na_grid' => $request['nr_na_grid'],
            'rzad' => $request['rzad'],
            'rodzaj' => $request['rodzaj'],
            'cennik_id' => $request['cennik_id'],
            'sala_id' => $request['sala_id'],


        ]);
        $miejsce->save();
        $sala =Sala::where('id', '=', $request->sala_id)->get()[0];
        $ilosc_miejsc  =Miejsca::select(DB::raw('count(id) as ile'))
            ->where('sala_id', '=',$sala->id )
            ->get()[0];
        $ilosc_rzad  =Miejsca::select(DB::raw('count(rzad) as aa'))
            ->where('sala_id', '=',$sala->id )->groupBy('rzad')
            ->get();


        $sala->update([
            'ilosc_miejsc'=>$ilosc_miejsc->ile,
            'ilosc_rzedow'=>count($ilosc_rzad)
        ]);
        return redirect(route('sale.miejsca.index',['sala' => $request['sala_id']]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Miejsca  $miejsca
     * @return \Illuminate\Http\Response
     */
    public function show(int $salaId):View

  {
      $sala = Sala::where('id', '=', $salaId)->get()[0];
      $ilerzedow = Miejsca::
      select(DB::raw('max(rzad) as max'))
          ->where('sala_id', '=', $salaId)

          ->get()[0];

      $max =Miejsca::select(DB::raw('max(nr_na_grid) as max'))
          ->where('sala_id', '=', $salaId)

          ->get()[0];

      $miejsca = Miejsca::where('sala_id', '=', $salaId)->get();

      return view('admin.miejsca.show', ['sala' => $sala,

          'ilerzedow' =>$ilerzedow,
          'max' =>$max,
          'miejsca'=>$miejsca,

      ]);
  }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Miejsca  $miejsca
     * @return \Illuminate\Http\Response
     */
    public function edit(int $miejsce):View
    {

        $cena = Cennik::all();
        $sala = Sala::all();
        $mi = Miejsca::where('id', '=', $miejsce)->get()[0];
        return view('admin.miejsca.update',
            ['miejsce' => $mi,
              'ceny' => $cena,
              'sale' => $sala,


        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Miejsca  $miejsca
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $miejsce):RedirectResponse
    {
        $mi = Miejsca::where('nr', '=', $request->nr)->where('rzad', '=', $request->rzad)->where('id', '!=', $miejsce)->where('sala_id', '=', $request->sala_id)->get();

        if(count($mi) != 0) {
            return redirect(route('miejsca.edit', ['miejsce' => $miejsce]))->with('error', 'Taki numer miejsca w tym rzedzie juz istnieje');
        }
        $mi = Miejsca::where('nr_na_grid', '=', $request->nr_na_grid)->where('rzad', '=', $request->rzad)->where('id', '!=', $miejsce)->where('sala_id', '=', $request->sala_id)->get();

        if(count($mi) != 0) {
            return redirect(route('miejsca.edit', ['miejsce' => $miejsce]))->with('error', 'Miejsce z takim Współrzędnymi już istnieje');
        }
        $cena = Cennik::where('id', '=', $request->cennik_id)->get()[0];

        if($request->rodzaj!=$cena->nazwa)
        {
            return redirect(route('miejsca.edit', ['miejsce' => $miejsce]))->with('error', 'Wyświetlana cena nie jest taka sama jak przdzielona cena z cenika');
        }

        $validated = $request->validate([

           'nr' => ['required', 'numeric', 'max:30','min:0'],
            'nr_na_grid' => ['required', 'numeric', 'max:30','min:0'],
            'rzad' => ['required', 'numeric', 'max:15','min:0'],
            'rodzaj'=>['required',new Enum(RodzajMiejsca::class)],
            'cennik_id'=>['required', 'numeric'],
            'sala_id'=>['required', 'numeric'],


        ]);



        $miejsce = Miejsca::where('id', '=', $miejsce)->get()[0];
        $miejsce ->update([
            'nr' => $request['nr'],
            'nr_na_grid' => $request['nr_na_grid'],
            'rzad' => $request['rzad'],
            'rodzaj' => $request['rodzaj'],
            'cennik_id' => $request['cennik_id'],
            'sala_id' => $request['sala_id'],


        ]);
        $sala =Sala::where('id', '=', $request->sala_id)->get()[0];
        $ilosc_miejsc  =Miejsca::select(DB::raw('count(id) as ile'))
            ->where('sala_id', '=',$sala->id )
            ->get()[0];
        $ilosc_rzad  =Miejsca::select(DB::raw('count(rzad) as aa'))
            ->where('sala_id', '=',$sala->id )->groupBy('rzad')
            ->get();


        $sala->update([
            'ilosc_miejsc'=>$ilosc_miejsc->ile,
            'ilosc_rzedow'=>count($ilosc_rzad)
        ]);

        return redirect(route('sale.miejsca.index',['sala' => $request['sala_id']]));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Miejsca  $miejsca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Miejsca $miejsce):JsonResponse
    {

        try{
            $miejsce->delete();

            $sala =Sala::where('id', '=', $miejsce->sala_id)->get()[0];
            $ilosc_miejsc  =Miejsca::select(DB::raw('count(id) as ile'))
                ->where('sala_id', '=',$sala->id )
                ->get()[0];
            $ilosc_rzad  =Miejsca::select(DB::raw('count(rzad) as aa'))
                ->where('sala_id', '=',$sala->id )->groupBy('rzad')
                ->get();


            $sala->update([
                'ilosc_miejsc'=>$ilosc_miejsc->ile,
                'ilosc_rzedow'=>count($ilosc_rzad)
            ]);


            return  response()->json(['status'=>'sucecess']);
        }catch (Exception $e){
            return  response()->json(['status'=>'error']);
        }

    }
}
