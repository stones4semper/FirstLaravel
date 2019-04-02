<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller{
    public function index(){
        // $posts = Post::all();
        // $posts = Post::orderBy('id', 'desc')->get();
        $posts = Post::orderBy('id', 'desc')->paginate(1);
        // $posts = Post::orderBy('id', 'desc')->take(1)->get();
        // $posts = Post::where('id', '2')->get();
        // $posts = DB::select('SELECT * FROM posts');
        return view('posts.index')->with('posts', $posts);
    }
    
    public function create(){
        return view('posts.create');
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
        ]);
        return 123;
    }
    
    public function show($id){
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }
    
    public function edit($id){
        //
    }
    
    public function update(Request $request, $id){
        //
    }
    
    public function destroy($id){
        //
    }
}
 