<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WeatherMapController extends Controller
{
    public function geocoded($user_location) {
        $response = Http::get('http://api.openweathermap.org/geo/1.0/zip', [
            'zip' => "{$user_location->zip},{$user_location->country}",
            'appid' => env('WEATHERMAP_API_KEY')
        ]);

        //Checking that we made a successful request.
        if ($response->successful()) {
            return $response->json();
        } else {
            return $response->json();
        }
        
        return false;
    }

    public function forecast($geocoded_location) {

        if (!isset($geocoded_location['lat']) || !isset($geocoded_location['lon'])) {
            return false;
        }
        
        $params = [
            'appid' => env('WEATHERMAP_API_KEY'),
            'lat' => $geocoded_location['lat'],
            'lon' => $geocoded_location['lon'],
            'exclude' => 'minutely,hourly',
            'units' => $geocoded_location['country'] == 'US' ? 'imperial' : 'metric'
        ];

        //The spec for phase one notes that we are only going to need the 7 day forecast for now, but for the sake of
        //future phases, I'm pulling from the 'onecall' endpoint.
        $response = Http::get('http://api.openweathermap.org/data/2.5/onecall', $params);

        //Checking that we made a successful request.
        if ($response->successful()) {
            return $response->json();
        } else {
            //Request unsuccessful. Throw an exception for now.
            $response->throw();
        }
        
        return false;
    }

    public function getForecast($user_location) {
        $result_key = "{$user_location->country}-{$user_location->zip}";

        //Implemented caching for API requests. Configurable in .env
        //Default is 600 seconds, since the API docs recommend calling no more than once every ten minutes for the same location.
        if (!Cache::has($result_key)) {
            $geocoded_location = self::geocoded($user_location);
            $forecast = self::forecast($geocoded_location);
            Cache::put($result_key, $forecast, env('CACHE_VALID_SECONDS'));

            return $forecast;
            
        } else {
            $forecast = Cache::get($result_key);

            return $forecast;
        }
        
        return false;
    }
}
