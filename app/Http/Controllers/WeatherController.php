<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WeatherMapController;
use App\Models\Location;

class WeatherController extends Controller
{
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
            'day' => $forecast['daily'][$day],
            'location' => $location
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

    public function lookup(Request $request) {
        $input = $request->all();
        return redirect("/weather/{$input['country']}-{$input['zip']}");
    }
}
