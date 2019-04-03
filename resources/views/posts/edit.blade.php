@extends('layouts.app')

@section('content')
    <div class="col-md-9">
        @include('inc.messages')
        <h3>Edit Post</h3>
        <form method="post" action="{{ route('posts.update', $post->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label>Title:</label>
                <input name="title" value="{{$post->title}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Body:</label>
                <textarea name="body" rows="5" class="form-control">{{$post->body}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Post</button>
            </div>
        </form>
    </div>
@endsection