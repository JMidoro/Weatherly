<div class="row">
    <div class="col-md-12">
        <div class="card shadow-lg">
            <div class="card-header bg-light text-dark p-3 text-center shadow-lg">
                <h1>{{ date("l, d M Y", $attributes['day']['sunrise']) }}</h1>
            </div>
            <div class="card-body bg-dark h-100">
                <div class='bg-dark bg-0 text-white'>
                    <div class='card-body py-0'>
                        <div class="row">
                            @foreach ($attributes['day']['weather'] as $weather)
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
                                <p>Sunrise: {{ date("g:i a", $attributes['day']['sunrise']) }}</p>
                                <p>Sunset: {{ date("g:i a", $attributes['day']['sunset']) }}</p>
                                <p>Moonrise: {{ date("g:i a", $attributes['day']['moonrise']) }}</p>
                                <p>Moonset: {{ date("g:i a", $attributes['day']['moonset']) }}</p>
                                <p>Moon Phase: {{ $attributes['day']['moon_phase'] }}</p>
                            </div>
                            <div class="col-md-3 card bg-dark p-4 shadow-lg">
                                <p>Temperature: Array&deg;</p>
                                <p>Feels Like: Array&deg;</p>
                                <p>Pressure: {{ $attributes['day']['pressure'] }}</p>
                                <p>Humidity: {{ $attributes['day']['humidity'] }}</p>
                                <p>Dew Point: {{ $attributes['day']['dew_point'] }}</p>
                            </div>
                            <div class="col-md-3 card bg-dark p-4 shadow-lg">
                                <p>Wind Speed: {{ $attributes['day']['wind_speed'] }}</p>
                                <p>Wind Degrees?: {{ $attributes['day']['wind_deg'] }}</p>
                                <p>Wind Gust: {{ $attributes['day']['wind_gust'] }}</p>
                                <p>Clouds: {{ $attributes['day']['clouds'] }}%</p>
                            </div>
                            <div class="col-md-3 card bg-dark p-4 shadow-lg">
                                <p>Pop: {{ $attributes['day']['pop'] }}</p>
                                <p>Uvi: {{ $attributes['day']['uvi'] }}</p>
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