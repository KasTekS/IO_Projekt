<?php

namespace App\Http\Controllers;

use App\Models\Cennik;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CennikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        return view('admin.cennik.index',[
            'ceny'=>Cennik::paginate(12)
        ]);
    }
    public function filter(Request $request):View
    {
        return view('admin.cennik.index',[
            'ceny'=>Cennik::where($request->co_szukac,$request->jak_szukac,$request->wartosc)->paginate(12)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        return view('admin.cennik.create');
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
            'nazwa' => 'required|max:20',
            'cena' => 'required|integer|between:0,100',


        ]);
        $cena = new Cennik($validated);
        $cena ->save();
       // Cennik::create($request->all());

        return redirect(route('ceenikedit'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cennik  $cennik
     * @return \Illuminate\Http\Response
     */
    public function show(Cennik $cennik):View
    {
        return view('kino.cennik',[
            'cens'=>Cennik::paginate(12)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cennik  $cennik
     * @return \Illuminate\Http\Response
     */
    public function edit(int $cennikId):View
    {
        $cena = Cennik::where('id', '=', $cennikId)->get()[0];
        return view('admin.cennik.update', ['cena' => $cena]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cennik  $cennik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $cennikId):RedirectResponse
    {

        $validated = $request->validate([
            'nazwa' => 'required|max:20',
            'cena' => 'required|integer|between:0,100',


        ]);
        $cena = Cennik::where('id', '=', $cennikId)->get()[0];
        $cena ->update($validated);
        return redirect(route('ceenikedit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cennik  $cennik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cennik $cennik):JsonResponse
    {
        try{
            $cennik->delete();
            return  response()->json(['status'=>'sucecess']);
        }catch (Exception $e){
            return  response()->json(['status'=>'error']);
        }

    }
}
