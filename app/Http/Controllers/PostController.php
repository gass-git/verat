<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    
    public function show($post_id){

        $post = Post::where('id', $post_id)->first();

        return view('layouts/post',compact('post'));

    }

    public function insert(Request $req){

        $img_new_name = date('dmy_H_s_i');

        $req->file('img')->storeAs('post-covers', $img_new_name, 'public');

        Post::insert([
            'category' => $req->category,
            'title' => $req->title,
            'body' => $req->post,
            'cover_url' => 'http://verat.test/storage/post-covers/'.$img_new_name,
            'claps' => 0,
            'views' => 0,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('home');

    }

}
