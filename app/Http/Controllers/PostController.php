<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PraiseRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    
    public function show($post_id){

        $user_ip = request()->ip();

        $post = Post::where('id', $post_id)->first();
        $post_id = $post->id;

        $like = PraiseRecord::where('ip', $user_ip)->first();

        return view('layouts/post',compact('post','post_id','like'));

    }

    public function insert(Request $req){

        $img_new_name = date('dmy_H_s_i');

        $req->file('img')->storeAs('post-covers', $img_new_name, 'public');

        Post::insert([
            'category' => $req->category,
            'title' => $req->title,
            'body' => $req->post,
            'cover_url' => 'http://verat.test/storage/post-covers/'.$img_new_name,
            'likes' => 0,
            'views' => 0,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('home');

    }

    public function like(Request $req){

        $user_ip = Request()->ip();

        $like_exists = PraiseRecord::where('ip', $user_ip)->first();

        if($like_exists){
            PraiseRecord::where('ip', $user_ip)->first()->delete();
        }else{
            PraiseRecord::insert([
                'ip' => $user_ip,
                'post_id' => $req->post_id
            ]);
        }

    }

}
