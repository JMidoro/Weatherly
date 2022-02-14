@extends('layouts.app')


@section('content')
<div class="container text-white p-3 m-auto">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="justify-content-center m-auto card col-md-8 bg-light text-dark shadow-lg px-5 py-3">
                <h1 class="m-3 text-center">Welcome to Weather.ly</h1>
                <p>
                    A small Laravel app created by Joey Midoro for 383's <a href="https://github.com/383Project/backend-technical-test">backend technical test</a>. 
                    I tried to build it as a complete "phase one", but I did build it with future phasing in mind: 
                    some resources exist with the understanding that they may get use later as the project is iterated upon.
                    As this is an assessment for a backend position, I didn't give much focus to the front end beyond just making something that was generally presentable.
                </p>
                <p>
                    With that in mind, I hope you enjoy looking over my pull requests and looking through the app.
                </p>
                <p>
                    Thanks,<br/>
                    Joey Midoro
                </p>
            </div>
            <div class="justify-content-center m-auto card col-md-8 bg-light text-dark shadow-lg my-3 px-5 py-3">
                <div class="row">
                    <a role="button" class="btn col-6" href='{{ route('login') }}' style="border-right: 1px solid #ccc;"><span class="h1 px-5 text-secondary">Login</span></a>
                    <a role="button" class="btn col-6" href='{{ route('register') }}'><span class="h1 px-5 text-secondary">Register</span></a>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
