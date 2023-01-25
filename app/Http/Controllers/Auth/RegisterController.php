<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $dt1 = Carbon::create(now());

        return Validator::make($data,
         [
            'imie' => ['required', 'alpha', 'max:50'],
            'nazwisko' => ['required', 'alpha', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'haslo' => ['required', 'string', 'min:8', 'confirmed'],
             'data_urodzenia'=>['required','date','before:'.$dt1],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'imie' => $data['imie'],
            'nazwisko' => $data['nazwisko'],
            'data_urodzenia' => $data['data_urodzenia'],
            'email' => $data['email'],
            'password' => Hash::make($data['haslo']),
        ]);
    }
}
