<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRang;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use Psy\Util\Json;
use function view;

class UsersControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
       return view('admin.users.userlist',[
           'users'=>User::paginate(12)
       ]);
    }

    public function filter(Request $request):View
    {
        return view('admin.users.userlist',[
            'users'=>User::where($request->co_szukac,$request->jak_szukac,$request->wartosc)->paginate(12)
        ]);
    }

    public function editadmin(int $userId):View
    {
        $user = User::where('id', '=', $userId)->get()[0];
        return view('admin.users.update', ['user' => $user]);

    }

    public function edit():View
    {
        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id):RedirectResponse
    {
        $user = User::where('id', '=', $id)->get()[0];
        $email = User::where('email', '=', $request->email)->where('id', '!=', $id)->get();

        if(count($email) != 0)
        {
            return redirect(route('user.edit', ['user' => $user]))->with('error', 'Ten email jest zajety');
        }
        $dt1 = Carbon::create(now());



        $user = User::where('id', '=', $id)->get()[0];

        $validated = $request->validate([
            'imie' => ['required', 'alpha', 'max:50'],
            'nazwisko' => ['required', 'alpha', 'max:50'],
            'haslo' => ['required', 'string', 'min:8 ', 'confirmed'],
            'email' => ['required', 'email','string','max:50'],
            'data_urodzenia'=>['required','date','before:'.$dt1],

        ]);



        $user ->update([
            'imie' => $validated['imie'],
            'nazwisko' => $validated['nazwisko'],
            'data_urodzenia' => $validated['data_urodzenia'],

            'email' => $validated['email'],
            'password' => Hash::make($validated['haslo'])
        ]);

        return redirect(route('home'));
    }



    public function updateadmin(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->get()[0];
        $email = User::where('email', '=', $request->email)->where('id', '!=', $id)->get();

        if(count($email) != 0)
        {
            return redirect(route('users.editadmin', ['user' => $user]))->with('error', 'Ten email jest zajety');
        }

        $dt1 = Carbon::create(now());

        $validated = $request->validate([
            'imie' => ['required', 'alpha', 'max:50'],
            'nazwisko' => ['required', 'alpha', 'max:50'],
            'haslo' => ['required', 'string', 'min:8 ', 'confirmed'],
            'email' => ['required', 'email','string','max:50'],
            'data_urodzenia'=>['required','date','before:'.$dt1],
            'rodzaj'=>['required',new Enum(UserRang::class)],
        ]);



        $user ->update([
            'imie' => $validated['imie'],
            'nazwisko' => $validated['nazwisko'],
            'data_urodzenia' => $validated['data_urodzenia'],
            'rodzaj' => $validated['rodzaj'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['haslo'])
        ]);
        return redirect(route('userlist'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(User $user):JsonResponse
    {
        try{
            $user->delete();
            return  response()->json(['status'=>'sucecess']);
        }catch (Exception $e){
            return  response()->json(['status'=>'error']);
        }


    }
}
