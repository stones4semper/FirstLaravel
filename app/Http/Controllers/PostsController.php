<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller{
    public function __construct(){
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }
    public function index(){
        // $posts = Post::all();
        // $posts = Post::orderBy('id', 'desc')->get();
        $posts = Post::orderBy('id', 'desc')->paginate(3);
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
            'cover_pix' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'body'=>'required'
        ]);      

        if($request->hasFile('cover_pix')){
            // get file with extension
            $fileNameWithExt = $request->file('cover_pix')->getClientOriginalName();
            // get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('cover_pix')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            $path = $request->file('cover_pix')->storeAs('public/cover_img', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'default.jpg';
        }
        
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_pix = $fileNameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', 'Post has been added');
    }
    
    public function show($id){
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }
    
    public function edit($id){
        $post = Post::find($id);
        if(auth()->user()->id != $post->user_id){
            return redirect('/posts')->with('error', 'You dont have permission to access that page');
        }
        return view('posts.edit')->with('post', $post);
    }
    
    public function update(Request $request, $id){
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect("/posts/$id")->with('success', 'Post has been updated');
    }
    
    public function destroy($id){
        $post = Post::find($id);
        if(auth()->user()->id != $post->user_id){
            return redirect('/posts')->with('error', 'You dont have permission to access that page');
        }
        $post->delete();
   
        return redirect('/posts')->with('success', 'Post has been deleted Successfully');
    }
}
 