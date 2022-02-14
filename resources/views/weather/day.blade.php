@extends('layouts.app')

@section('content')
<div class="container">
    <x-day :location="$location" :day="$day"/>
</div>
@endsection
