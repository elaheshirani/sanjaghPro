@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Show User
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="ID">ID:</label>
                    {{$user['_id']}}
                </li>
                <li class="list-group-item">
                    <label for="UserName">Name :</label>
                    {{$user['name']}}
                </li>
                <li class="list-group-item">
                    <label for="UserEmail">Email :</label>
                    {{$user['email']}}
                </li>
            </ul>
        </div>
    </div>
@endsection
