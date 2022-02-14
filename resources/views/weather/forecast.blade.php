@extends('layouts.app')

@section('content')
<div class="container">
    <x-forecast :forecast='$forecast' :location='$location' title="Seven Day Forecast for {{$location->zip}}, {{$location->country}}"/>
</div>
@endsection
