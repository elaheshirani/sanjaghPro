@extends('layouts.app')
@section('content')
    <div class="container">
        <br />
        <br />
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th >Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user['_id']}}</td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>
                        <a href="{{route('user.show',[$user['_id']])}}" class="btn btn-warning">Show</a>
                    </td>
                    <td>
                        <form action="{{route('user.destroy',[$user['_id']])}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
