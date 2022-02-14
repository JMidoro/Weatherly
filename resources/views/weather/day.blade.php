@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg bg-dark">

                <div class="card-header bg-dark text-white p-3 text-center shadow-lg">
                    <h1>{{ date("l, d M Y", $day['sunrise']) }}</h1>
                </div>

                <div class="card-body bg-dark h-100">
                    <div class='bg-dark bg-0 text-white'>
                        <div class='card-body py-0'>
                            <div class="row">
                                @foreach ($day['weather'] as $weather)
                                <div class="card bg-dark mb-4 shadow-lg">
                                    <div class="row">
                                        <div class="col-md-2 justify-content-center">
                                            <img class="m-auto d-block" src='http://openweathermap.org/img/wn/{{$weather['icon']}}@2x.png'>
                                        </div>
                                        <div class="col-md-10 p-3">
                                            <h2 class="bold">
                                                {{ $weather['main'] }}
                                            </h2>
                                            <div class="bold">
                                                {{ $weather['description'] }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row bg-dark">
                                <div class="col-md-3 card bg-dark p-4 shadow-lg">
                                    <p>Sunrise: {{ date("g:i a", $day['sunrise']) }}</p>
                                    <p>Sunset: {{ date("g:i a", $day['sunset']) }}</p>
                                    <p>Moonrise: {{ date("g:i a", $day['moonrise']) }}</p>
                                    <p>Moonset: {{ date("g:i a", $day['moonset']) }}</p>
                                    <p>Moon Phase: {{ $day['moon_phase'] }}</p>
                                </div>
                                <div class="col-md-3 card bg-dark p-4 shadow-lg">
                                    <p>Temperature: Array</p>
                                    <p>Feels Like: Array</p>
                                    <p>Pressure: {{ $day['pressure'] }}</p>
                                    <p>Humidity: {{ $day['humidity'] }}</p>
                                    <p>Dew Point: {{ $day['dew_point'] }}</p>
                                </div>
                                <div class="col-md-3 card bg-dark p-4 shadow-lg">
                                    <p>Wind Speed: {{ $day['wind_speed'] }}</p>
                                    <p>Wind Degrees?: {{ $day['wind_deg'] }}</p>
                                    <p>Wind Gust: {{ $day['wind_gust'] }}</p>
                                    <p>Clouds: {{ $day['clouds'] }}</p>
                                </div>
                                <div class="col-md-3 card bg-dark p-4 shadow-lg">
                                    <p>Pop: {{ $day['pop'] }}</p>
                                    <p>Uvi: {{ $day['uvi'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
