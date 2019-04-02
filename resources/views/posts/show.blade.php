@extends('layout.app')

@section('content')
    <div class="col-md-9">
        @if($post)
            <div class="card mb-3">
                {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text"><small class="text-muted">{{$post->created_at->diffForHumans()}}</small></p>
                    <p class="card-text">{{$post->body}}</p>
                </div>
            </div>
        @endif
    </div>
@endsection