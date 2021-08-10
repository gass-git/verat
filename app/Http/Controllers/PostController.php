<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function show($post_id){

        $post = Post::where('id', $post_id)->first();

        return view('layouts/post',compact('post'));

    }

    public function insert(Request $req){

        Post::insert([
            'category' => $req->category,
            'title' => $req->title,
            'body' => $req->post,
            'image' => 'localhost',
            'views' => 0,
            'created_at' => Carbon::now()
        ]);

        return view('layouts/home');

    }

}
