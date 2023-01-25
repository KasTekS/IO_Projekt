<?php

namespace App\Http\Controllers;

use App\Enums\Glos;
use App\Enums\RodzajSean;
use App\Models\Film;
use App\Models\Sala;
use App\Models\Seans;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;

class SeansController extends Controller

{
public function index():View
{
    return view('admin.seans.index',[
        'seans'=>Seans::paginate(12),


    ]);
}
    public function filter(Request $request):View
    {
        return view('admin.seans.index',[
            'seans'=>Seans::where($request->co_szukac,$request->jak_szukac,$request->wartosc)->paginate(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
{
    return view('admin.seans.create',[

        'film'=>Film::where('czy_jest_grany', '=', 1)->get(),
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

    $dt1 = Carbon::create(now());
    $validated = $request->validate([
        'data_seansu'=>'required|date|after:'.$dt1,
        'rodzaj' => 'required',new Enum(RodzajSean::class),
        'glos' => 'required',new Enum(Glos::class),
        'film_id' => 'required|integer|min:0',
        'sala_id' => 'required|integer|min:0',


    ]);
    $seans = new Seans($validated);

    $seans->save();


    return redirect(route('seans'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sala  $seans
     * @return \Illuminate\Http\Response
     */
    public function edit(int $seansId):View
{
    $seans = Seans::where('id', '=', $seansId)->get()[0];
    return view('admin.seans.update', ['seans' => $seans,
        'film'=>Film::where('czy_jest_grany', '=', 1)->get(),
        'sala'=>Sala::all()]);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sala  $seans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $seansId):RedirectResponse
{

    $seans = Seans::where('id', '=', $seansId)->get()[0];
    $dt1 = Carbon::create(now());
    $validated = $request->validate([
        'data_seansu'=>'required|date|after:'.$dt1,
        'rodzaj' => 'required|max:10',
        'glos' => 'required',new Enum(Glos::class),
        'film_id' => 'required|integer|min:0',
        'sala_id' => 'required|integer|min:0',


    ]);
    $seans ->update($validated);
    return redirect(route('seans'));
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sala  $seans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seans $seans): JsonResponse
{

    try{
        $seans->delete();
        return  response()->json(['status'=>'sucecess']);
    }catch (Exception $e){
        return  response()->json(['status'=>'error']);
    }



}
}
