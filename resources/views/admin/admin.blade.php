@extends('layouts.app')

@section('content')
<div class="container p-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-light text-dark p-3 text-center shadow-lg">
                    <h1>Users</h1>
                </div>
                <div class="card-body bg-dark h-100">
                    <div class='bg-dark text-white'>
                        <div class='card-body p-0'>
                            <div class="row">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Zip</th>
                                            <th>Country</th>
                                            <th>Joined</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                @foreach (json_decode($user->location) as $value)
                                                    <td>{{$value}}</td>
                                                @endforeach
                                                <td>{{$user->created_at}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
