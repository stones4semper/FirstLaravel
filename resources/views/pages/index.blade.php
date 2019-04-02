@extends('layout.app')
@section('content')
    <div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <p>This na index Page</p>
        <p><a class="btn btn-success mr-4" href="{{'/login'}}">Login</a><a class="btn btn-primary" href="{{'/register'}}">Register</a></p>
    </div>
@endsection