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
                <th>Created At</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user['_id']}}</td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{date('Y-m-d H:i:s', strtotime($user['created_at']['date']))}}</td>
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
        @if($page > 1)
            <a href="?page={{$prev}}" class="btn btn-secondary mr-2" >Previous</a>
            @if($page * $limit < 100)
                <a href="?page={{$next}}" class="btn btn-secondary ml-2">Next</a>
            @endif
        @else
            @if($page * $limit < 100)
                <a href="?page={{$next}}" class="btn btn-secondary">Next</a>
            @endif
        @endif
    </div>
@endsection
