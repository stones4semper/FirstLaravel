@extends('layouts.app')

@section('content')
    <div class="col-md-8 m-3">
        @if($post)
            <p class="card mb-3">
                {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                <p class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">
                        <small class="text-muted">{{$post->created_at->diffForHumans()}}</small> 
                        <span class="float-right">By {{$post->user->name}}</span>                       
                    </p>
                    @if(!Auth::guest())
                        @if(Auth::user()->id == $post->user_id)
                            <p class="card-text">
                                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-sm float-right">Edit</a> 
                                <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form> 
                            </p>
                        @endif
                    @endif
                    <p class="card-text">
                        {!!$post->body!!}
                    </p>
                </div>
            </div>
        @endif
    </div>
@endsection

