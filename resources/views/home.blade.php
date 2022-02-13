@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg text-white shadow-lg my-4">
                <div class="card-body bg-dark">
                    <h1>Welcome, {{$user->name}}!</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header">{{ __('Your Seven Day Forecast') }}</div>

                <div class="card-body bg-dark h-100">
                    @foreach ($forecast['daily'] as $index => $day)
                    <a href="#">
                        <div role="button" class='button bg-dark text-white d-inline-block shadow-lg py-5' style="margin:0px; padding:0px; width:calc(97% / 8);">
                            <div class='card-body'>
                                <h4>{{ date("d M Y", $day['sunrise']) }}</h4>
                                <div class="row">
                                    <div class="col-md-12 justify-content-center">
                                        @foreach ($day['weather'] as $weather)
                                        <img class="m-auto d-block" src='http://openweathermap.org/img/wn/{{$weather['icon']}}@2x.png'>
                                        <div class="bold text-center">
                                            {{ $weather['main'] }}
                                        </div>
                                        <div class="bold text-center">
                                            {{ $weather['description'] }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row d-none">
                                    <div class="col-md-3">
                                        <p>Sunrise: {{ date("g:i a", $day['sunrise']) }}</p>
                                        <p>Sunset: {{ date("g:i a", $day['sunset']) }}</p>
                                        <p>Moonrise: {{ date("g:i a", $day['moonrise']) }}</p>
                                        <p>Moonset: {{ date("g:i a", $day['moonset']) }}</p>
                                        <p>Moon Phase: {{ $day['moon_phase'] }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Temperature: Array</p>
                                        <p>Feels Like: Array</p>
                                        <p>Pressure: {{ $day['pressure'] }}</p>
                                        <p>Humidity: {{ $day['humidity'] }}</p>
                                        <p>Dew Point: {{ $day['dew_point'] }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Weather: Array</p>
                                        <p>Wind Speed: {{ $day['wind_speed'] }}</p>
                                        <p>Wind Degrees?: {{ $day['wind_deg'] }}</p>
                                        <p>Wind Gust: {{ $day['wind_gust'] }}</p>
                                        <p>Clouds: {{ $day['clouds'] }}</p>
                                        <p>Pop: {{ $day['pop'] }}</p>
                                        <p>Uvi: {{ $day['uvi'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
