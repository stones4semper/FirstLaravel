<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
class TestsController extends Controller{
    public function index(){
        return view('pages.test');
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $files = $request->file('files');
        if(!empty($files)){
            foreach($files as $file){
                $fileNameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $file->storeAs('public/cover_img', $fileNameToStore);
            }
        }
        return \Response::json(array('success'=>"Uploaded SuccessFully"));
    }

    public function show($id){
        //
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
