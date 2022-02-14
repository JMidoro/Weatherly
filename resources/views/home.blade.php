@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg text-white shadow-lg my-4">
                <div class="card-body bg-dark p-5">
                    <h2>Welcome, {{$user->name}}!</h2>
                    <p>You can find your seven day forecast below. Click on any of the days to view more in-depth information about the forecast for that day. Or use the postal code and country selectors at the top to view the weather in other locations.</p>
                </div>
            </div>
        </div>
    </div>
    <x-forecast :forecast='$forecast' :location='$location' title="Your Seven Day Forecast"/>
</div>
@endsection
