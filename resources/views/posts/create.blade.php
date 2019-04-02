@extends('layout.app')

@section('content')
    <div class="col-md-9">
        <div class="col-md-9">
            <h3>Create Post</h3>
            <form action="/posts" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Title:</label>
                    <input name="title" class="form-control"/>
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