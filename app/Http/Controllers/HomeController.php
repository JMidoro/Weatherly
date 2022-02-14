<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
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

    public function day($country, $zip, $day)
    {
        $location = (object) array(
            'zip' => $zip,
            'country' => strtoupper($country)
        );

        $user = auth()->user();
        $forecast = WeatherMapController::getForecast($location);

        date_default_timezone_set($forecast['timezone']);

        return view('weather.day', [
            'day' => $forecast['daily'][$day]
        ]);
    }

    public function forecast($country, $zip)
    {
        $location = (object) array(
            'zip' => $zip,
            'country' => strtoupper($country)
        );

        $user = auth()->user();
        $forecast = WeatherMapController::getForecast($location);

        if (!$forecast) {
            return abort(404);
        }

        date_default_timezone_set($forecast['timezone']);

        return view('weather.forecast', [
            'forecast' => $forecast,
            'location' => $location
        ]);
    }

    public function lookup (Request $request) {
        $input = $request->all();
        return redirect("/weather/{$input['country']}-{$input['zip']}");
    }
}
