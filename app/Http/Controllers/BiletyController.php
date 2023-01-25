<?php

namespace App\Http\Controllers;

use App\Models\Bilety;
use App\Models\Miejsca;
use App\Models\Seans;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BiletyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('admin.bilety.index', [
            'bilety' => Bilety::paginate(12),


        ]);
    }
    public function filter(Request $request):View
    {
        return view('admin.bilety.index',[
            'bilety' => Bilety::where($request->co_szukac,$request->jak_szukac,$request->wartosc)->paginate(12)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('admin.bilety.create', [

            'seanse' => Seans::where('data_seansu', '>', today())->get(),
            'users' => User::all(),
            'miejsca' => Miejsca::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storee(Request $request): RedirectResponse
    {
        $seanse=Seans::where('id', '=', $request->get('sean_id'))->get()[0];
        $miejsce= Miejsca::where('id','=',$request->miejsca_id)->get()[0];



        $bilet = Bilety::where('sean_id', '=', $request->sean_id)->where('miejsca_id', '=', $request->miejsca_id)->get();

        if(count($bilet) != 0) {
            return redirect(route('bilety.create'))->with('error', 'to miejsce zostało sprzedane na ten seans');
        }

        if($seanse->sala_id!=$miejsce->sala_id) {
            return redirect(route('bilety.create'))->with('error', 'te seans nie jest grany nw tej sali');
        }


        $validated = $request->validate([
            'cena' => 'required|numeric|max:100|min:0',
            'sean_id' => 'required|min:0|integer',

            'user_id' => 'required|integer|min:0',
            'miejsca_id' => 'required|integer|min:0',


        ]);
        $bilet = new Bilety($validated);

        $bilet->save();


        return redirect(route('bilety'));

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\
     * @return \Illuminate\Http\Response
     */
    public function show():View
    {
        return view('admin.bilety.show', [
            'bilety' => Bilety::where('user_id','=',(Auth::user()->id))->paginate(12),


        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $miejsca = $request->get('miejsca');

        foreach ($miejsca as $miejsce) {
            $miejsc = Miejsca::where('id', '=', $miejsce)->get()[0];
            $bilet = Bilety::create([
                'cena' => $miejsc->cennik->cena,
                'user_id' => $request['user_id'],
                'sean_id' => $request['seans_id'],
                'miejsca_id' => $miejsc->id


            ]);
            $bilet->save();
        }
        return redirect(route('bilety.show'));

    }

    public function edit(int $bilet): View
    {
        $bileta = Bilety::where('id', '=', $bilet)->get()[0];
        return view('admin.bilety.update', ['bilet' => $bileta,
            'seanse' => Seans::where('data_seansu', '>', today())->get(),
            'users' => User::all(),
            'miejsca' => Miejsca::all()]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sala $seans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bilety $bilet): RedirectResponse
    {
        $seanse=Seans::where('id', '=', $request->get('sean_id'))->get()[0];
        $miejsce= Miejsca::where('id','=',$request->miejsca_id)->get()[0];



        $bilett = Bilety::where('id', '!=', $bilet->id)->where('sean_id', '=', $request->sean_id)->where('miejsca_id', '=', $request->miejsca_id)->get();

        if(count($bilett) != 0) {
            return redirect(route('bilety.edit',['bilet' => $bilet->id]))->with('error', 'to miejsce zostało sprzedane na ten seans');
        }

        if($seanse->sala_id!=$miejsce->sala_id) {
            return redirect(route('bilety.edit',['bilet' => $bilet->id]))->with('error', 'te seans nie jest grany nw tej sali');
        }


        $validated = $request->validate([
            'cena' => 'required|numeric|max:100|min:0',
            'sean_id' => 'required|min:0|integer',

            'user_id' => 'required|integer|min:0',
            'miejsca_id' => 'required|integer|min:0',


        ]);
        $bilet->update($validated);
        return redirect(route('bilety'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Sala $seans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bilety $bilet): JsonResponse
    {

        try {
            $bilet->delete();
            return response()->json(['status' => 'sucecess']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error']);
        }


    }
}
