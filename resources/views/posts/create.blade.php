@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7">
            @include('inc.messages')
            <h3>Create Post</h3>
            <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title:</label>
                    <input name="title" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Cover picture:</label>
                    <input type="file" name="cover_pix">
                </div>                
                <div class="form-group">
                    <label>Body:</label>
                    <textarea name="body" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection