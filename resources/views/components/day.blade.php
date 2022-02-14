<div class="row pt-3">
    <div class="col-md-12">
        <div class="card shadow-lg">
            <div class="card-header bg-light text-dark p-3 text-center shadow-lg">
                <h1>{{ date("l, d M Y", $attributes['day']['sunrise']) }}</h1>
            </div>
            <div class="card-body bg-dark h-100">
                <div class='bg-dark text-white'>
                    <div class='card-body py-0'>
                        <div class="row">
                            @foreach ($attributes['day']['weather'] as $weather)
                            <div class="card bg-dark mb-4 shadow-lg">
                                <div class="row">
                                    <div class="col-md-2 justify-content-center">
                                        <img class="m-auto d-block" src='http://openweathermap.org/img/wn/{{$weather['icon']}}@2x.png'>
                                    </div>
                                    <div class="col-md-2 p-3">
                                        <h1 class="bold p-0 m-0">
                                            {{ $weather['main'] }}
                                        </h1>
                                        <div class="bold">
                                            {{ $weather['description'] }}
                                        </div>
                                    </div>
                                    <div class="col-md-2 p-3">
                                        <div>Sunrise: {{ date("g:i a", $attributes['day']['sunrise']) }}</div>
                                        <div>Sunset: {{ date("g:i a", $attributes['day']['sunset']) }}</div>
                                        <div>Precipitation: {{ $attributes['day']['pop'] * 100 }}%</div>
                                    </div>
                                    <div class="col-md-2 p-3">
                                        <div>Moonrise: {{ date("g:i a", $attributes['day']['moonrise']) }}</div>
                                        <div>Moonset: {{ date("g:i a", $attributes['day']['moonset']) }}</div>
                                        <div>Clouds: {{ $attributes['day']['clouds'] }}%</div>
                                    </div>
                                    <div class="col-md-2 p-3">
                                        <div>Moon Phase: {{ $attributes['day']['moon_phase'] }}</div>
                                        <div>Low: {{$attributes['day']['temp']['min']}}&deg; {{$attributes['location']->country == "US" ? 'F' : 'C'}}</div>
                                        <div>High: {{$attributes['day']['temp']['max']}}&deg; {{$attributes['location']->country == "US" ? 'F' : 'C'}}</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row bg-dark">
                            <div class="col-md-3 card bg-dark p-4 shadow-lg">
                                <div>
                                    <h4>Temperature:</h4>
                                    <div class="px-3">
                                        <div>Morning: {{$attributes['day']['temp']['morn']}}&deg; {{$attributes['location']->country == "US" ? 'F' : 'C'}}</div>
                                        <div>Day: {{$attributes['day']['temp']['day']}}&deg; {{$attributes['location']->country == "US" ? 'F' : 'C'}}</div>
                                        <div>Evening: {{$attributes['day']['temp']['eve']}}&deg; {{$attributes['location']->country == "US" ? 'F' : 'C'}}</div>
                                        <div>Night: {{$attributes['day']['temp']['night']}}&deg; {{$attributes['location']->country == "US" ? 'F' : 'C'}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 card bg-dark p-4 shadow-lg">
                                <div>
                                    <h4>Feels Like:</h4>
                                    <div class="px-3">
                                        <div>Morning: {{$attributes['day']['feels_like']['morn']}}&deg; {{$attributes['location']->country == "US" ? 'F' : 'C'}}</div>
                                        <div>Day: {{$attributes['day']['feels_like']['day']}}&deg; {{$attributes['location']->country == "US" ? 'F' : 'C'}}</div>
                                        <div>Evening: {{$attributes['day']['feels_like']['eve']}}&deg; {{$attributes['location']->country == "US" ? 'F' : 'C'}}</div>
                                        <div>Night: {{$attributes['day']['feels_like']['night']}}&deg; {{$attributes['location']->country == "US" ? 'F' : 'C'}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 card bg-dark p-4 shadow-lg">
                                <div>Wind Speed: {{ $attributes['day']['wind_speed'] }} {{$attributes['location']->country == "US" ? 'mph' : 'kph'}}</div>
                                <div>Wind Degrees: {{ $attributes['day']['wind_deg'] }}&deg;</div>
                                <div>Wind Gust: {{ $attributes['day']['wind_gust'] }} {{$attributes['location']->country == "US" ? 'mph' : 'kph'}}</div>
                                <div>UV Index: {{ $attributes['day']['uvi'] }}</div>
                            </div>
                            <div class="col-md-3 card bg-dark p-4 shadow-lg">
                                <div>Pressure: {{ $attributes['day']['pressure'] }} hPa</div>
                                <div>Humidity: {{ $attributes['day']['humidity'] }}%</div>
                                <div>Dew Point: {{ $attributes['day']['dew_point'] }}&deg; {{$attributes['location']->country == "US" ? 'F' : 'C'}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="justify-content-end d-flex px-2">
    <a role="button" class="button d-inline-block bg-light text-dark px-2 rounded-bottom" href="{{ url()->previous() }}">
        Back
    </a>
</div>