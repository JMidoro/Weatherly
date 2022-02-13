<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Location;
use App\Rules\isValidLocation;
use Illuminate\Validation\Rule;


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
        
        $country_invalid = 'Invalid Country.';
        $messages = [
            'country.min' => $country_invalid,
            'country.max' => $country_invalid,
            'country.in' => $country_invalid
        ];

        $countries = new Location;
        $country_codes = array_keys((array) $countries->all_countries());

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'postal_code' => ['required', 'string', new isValidLocation],
            'country' => ['required', 'string', 'min:2', 'max:2', Rule::in($country_codes)]
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $location = (object) array(
            'zip' => $data['postal_code'],
            'country' => $data['country']
        );

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'location' => json_encode($location)
        ]);
    }

    
    public function showRegistrationForm()
    {
        //For setting a default value in the countries dropdown. Temporary solution, until paid services are acquired
        $json = file_get_contents("http://ipinfo.io/{$_SERVER['REMOTE_ADDR']}/geo");
        $user_country = 'US';
        if ($location_json = json_decode($json, true) !== false && isset($location_json['country'])) {
            $user_country = $location_json['country'];
        }

        $locations = new Location;
        return view('auth.register', [
            'user_country' => $user_country,
            'countries' => $locations->all_countries()
        ]);
    }
    
}
