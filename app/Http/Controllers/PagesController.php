<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller{
    public function index(){
        $title = "Welcome to my tutorial";
        // return view('pages.index')->with('title', $title);
        // return view('pages.index')->with('title', $title);
        return view('pages.index', compact('title'));
    }
    public function about(){
        $title = "Welcome to my about page";
        return view('pages.about')->with('title', $title);
    }
    public function service(){
        $data= array(
            'title'=>"My service page",
            'services'=>['programming', 'networking', 'graphics design', 'cyber security', 'software dev training'],
            'content'=>"This na my content Page Content",
        );
        return view('pages.services')->with($data);
    }
}
