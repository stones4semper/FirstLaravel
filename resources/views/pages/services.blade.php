@extends('layouts.app')
@section('content')
    <h1>{{$title}}</h1>
    <p>{{$content}}</p>
    @if(count($services)>0)
        <div class="col-md-4">
            <ul class="list-group">
                @foreach($services as $service)
                    <li class="list-group-item">{{$service}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection