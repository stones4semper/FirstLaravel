@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('inc.messages')
            @if(count($posts)>0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td></td>
                                <td>{{$post->title}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm mb-2" href="posts/{{$post->id}}/">Show</a>
                                    <a class="btn btn-info btn-sm mb-2" href="posts/{{$post->id}}/edit">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                {{-- {{$posts->links()}} --}}
            @else
                <h3>You have no Post</h3>
            @endif
        </div>
    </div>
</div>
@endsection
