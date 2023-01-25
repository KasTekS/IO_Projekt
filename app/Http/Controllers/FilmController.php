<?php

namespace App\Http\Controllers;

use App\Enums\KategoriaFilm;
use App\Enums\KategoriaWiekowa;
use App\Enums\UserRang;
use App\Models\Film;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        return view('admin.film.index',[
            'filmy'=>Film::paginate(12)
        ]);
    }

    public function filter(Request $request):View
    {
        return view('admin.film.index',[
            'filmy'=>Film::where($request->co_szukac,$request->jak_szukac,$request->wartosc)->paginate(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        return view('admin.film.create');
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

            'tytul' => 'required|max:50',
            'data_premiery' => 'required|date',
            'kategoria' => 'required',new Enum(KategoriaFilm::class),
            'czas_trwania' => 'required|max:50',
            'kategoria_wiekowa' => 'required',new Enum(KategoriaWiekowa::class),
            'opis' => 'required|max:500',
            'czy_jest_grany' => 'required|boolean',
            'okladka_link' => 'required|image|mimes:jpg,png',
            'duze_zdj_link' => 'required|image|mimes:jpg,png',


        ]);

        $film = new Film($validated);
        $film->okladka_link = $request->file('okladka_link')->store('avatars');
        $film->duze_zdj_link = $request->file('duze_zdj_link')->store('tlo');
        $film->save();

        return redirect(route('film'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cennik  $cennik
     * @return \Illuminate\Http\Response
     */
    public function edit(int $filmId):View
    {
        $film = Film::where('id', '=', $filmId)->get()[0];
        return view('admin.film.update', ['film' => $film]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cennik  $cennik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $filmId):RedirectResponse
    {
        $validated = $request->validate([

            'tytul' => 'required|max:50',
            'data_premiery' => 'required|date',
            'kategoria' => 'required',new Enum(KategoriaFilm::class),
            'czas_trwania' => 'required|max:50',
            'kategoria_wiekowa' => 'required',new Enum(KategoriaWiekowa::class),
            'opis' => 'required|max:500',
            'czy_jest_grany' => 'required|boolean',
            'okladka_link' => 'required|image|mimes:jpg,png',
            'duze_zdj_link' => 'required|image|mimes:jpg,png',


        ]);

        $film = Film::where('id', '=', $filmId)->get()[0];



        $film ->update([

            'tytul' => $validated['tytul'],
            'data_premiery' => $validated['data_premiery'],
            'kategoria' => $validated['kategoria'],
            'czas_trwania' => $validated['czas_trwania'],
            'kategoria_wiekowa' => $validated['kategoria_wiekowa'],
            'opis' => $validated['opis'],
            'czy_jest_grany' => $validated['czy_jest_grany'],
          'okladka_link' => $request->file('okladka_link')->store('avatars'),
          'duze_zdj_link' =>  $request->file('duze_zdj_link')->store('tlo'),
        ]);


        return redirect(route('film'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cennik  $cennik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film):JsonResponse
    {
        try{
            $film->delete();
            return  response()->json(['status'=>'sucecess']);
        }catch (Exception $e){
            return  response()->json(['status'=>'error']);
        }

    }
}

