<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-lg">
            <div class="card-header">{{$attributes['title']}}</div>

            <div class="card-body bg-dark h-100">
                @foreach ($attributes['forecast']['daily'] as $index => $day)
                <a href="{{ route('weather.day', [$attributes['location']->country, $attributes['location']->zip, $index]) }}">
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
                                    <div class="small text-center">
                                        {{ $weather['description'] }}
                                    </div>
                                    @endforeach
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
@if(!Request::is('home'))
<div class="justify-content-end d-flex px-2">
    <a role="button" class="button d-inline-block bg-light text-dark px-2 rounded-bottom" href="{{ url()->previous() }}">
        Back
    </a>
</div>
@endif