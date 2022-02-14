@extends('layouts.app')

@section('content')
<div class="container">
    <x-day :day="$day"/>
</div>
@endsection
