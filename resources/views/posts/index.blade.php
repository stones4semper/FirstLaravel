@extends('layout.app')
@section('content')
    <h1>Posts</h1> 
    <div class="col-md-8">
        @if(count($posts)>0)
            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item mb-3">
                        <div class="col-md-12">
                            <strong class="heading"><a href="posts/{{$post->id}}">{{$post->title}}</a></strong>
                            <small class="float-right">{{$post->created_at->diffForHumans()}}</small> 
                        </div>
                        <div>{{$post->body}}</div>
                    </li>
                @endforeach
            </ul>
            {{$posts->links()}}
        @else
            <h3>No Post Found</h3>
        @endif
    </div>
@endsection
