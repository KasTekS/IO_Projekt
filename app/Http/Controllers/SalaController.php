<?php

namespace App\Http\Controllers;

use App\Enums\Ekrany;
use App\Enums\UserRang;
use App\Models\Sala;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use function redirect;
use function response;
use function view;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        return view('admin.sale.index',[
            'sala'=>Sala::paginate(12),

        ]);
    }
    public function filter(Request $request):View
    {
        return view('admin.sale.index',[
            'sala'=>Sala::where($request->co_szukac,$request->jak_szukac,$request->wartosc)->paginate(12)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        return view('admin.sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request):RedirectResponse
    {

        $validated = $request->validate([
            'ekran' => 'required',new Enum(Ekrany::class),
            'ilosc_rzedow' => 'required|integer|between:0,15',
            'ilosc_miejsc' => 'required|integer|between:0,450',

        ]);



        $sala = new Sala($validated);

        $sala->save();


        return redirect(route('sala'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function edit(int $salaId):View
    {
        $sala = Sala::where('id', '=', $salaId)->get()[0];
        return view('admin.sale.update', ['sala' => $sala]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $salaId):RedirectResponse
    {

        $sala = Sala::where('id', '=', $salaId)->get()[0];
        $validated = $request->validate([

            'ilosc_rzedow' => 'required|integer|between:0,15',
            'ilosc_miejsc' => 'required|integer|between:0,450',
            'ekran' => 'required',new Enum(Ekrany::class),

        ]);
        $sala ->update($validated);
        return redirect(route('sala'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sala $sala): JsonResponse
    {

            try{
                $sala->delete();
                return  response()->json(['status'=>'sucecess']);
            }catch (Exception $e){
                return  response()->json(['status'=>'error']);
            }



    }
}
