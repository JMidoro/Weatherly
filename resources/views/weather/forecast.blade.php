@extends('layouts.app')

@section('content')
<div class="container pt-3">
    <x-forecast :forecast='$forecast' :location='$location' title="Seven Day Forecast for {{$location->zip}}, {{$location->country}}"/>
</div>
@endsection
