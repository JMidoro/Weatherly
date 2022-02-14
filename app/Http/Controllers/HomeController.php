<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WeatherMapController;

class HomeController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $location = json_decode($user->location);
        $forecast = WeatherMapController::getForecast($location);

        date_default_timezone_set($forecast['timezone']);


        return view('home', [
            'user' => $user,
            'forecast' => $forecast,
            'location' => $location
        ]);
    }
}
