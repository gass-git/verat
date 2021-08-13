<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use App\Models\UniqueVisit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $IP = request()->ip();

        // New ip?
        if( UniqueVisit::where('ip', $IP)->first() == null ){

            UniqueVisit::insert([
                'ip' => $IP, 
                'created_at' => Carbon::now()
            ]);
        }

        $posts = Post::whereNotNull('body')->orderBy('id','DESC')->paginate(6);
        $field = 'Latest';

        return view('layouts/home', compact('posts','field'));
    }

    public function sortby($field){

        if($field == 'latest'){
            $posts = Post::orderBy('created_at', 'DESC')->paginate(6);
        }

        if($field == 'views'){
            $posts = Post::orderby($field,'DESC')->paginate(6);
        }

        if($field == 'popularity'){
            $posts = Post::orderby('likes','DESC')->paginate(6);
        }

        return view('layouts/home', compact('posts'));

    }

    public function show_topic($field){

        $posts = Post::where('category', $field)->paginate(6);

        return view('layouts/home', compact('posts','field'));

    }

}
