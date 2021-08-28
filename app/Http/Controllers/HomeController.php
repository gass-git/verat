<?php

namespace App\Http\Controllers;

use App\Models\Interaction;
use App\Models\Post;
use Carbon\Carbon;
use App\Models\UniqueVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('layouts/home', compact('posts','field','IP'));
    }

    public function sortby($field){

        $IP = request()->ip();

        if($field == 'latest'){
            $posts = Post::orderBy('created_at', 'DESC')->paginate(6);
        }

        if($field == 'views'){
            $posts = Post::orderBy('views','DESC')->paginate(6);
        }

        if($field == 'popularity'){
            $posts = Post::orderBy('likes','DESC')->paginate(6);
        }

        if($field == 'comments'){
            $posts = Post::orderBy('comments','DESC')->paginate(6);
        }

        return view('layouts/home', compact('posts','IP'));

    }

    public function show_topic($field){

        $IP = request()->ip();

        $posts = DB::table('posts')->join('categories','posts.id','categories.post_id')
                    ->where('categories.category', $field)
                    ->paginate(6); 

        return view('layouts/home', compact('posts','field','IP'));

    }

    public function bookmark(Request $req){

        $user_ip = Request()->ip();

        $interaction = Interaction::where('ip', $user_ip)->where('post_id', $req->post_id)->first();

        if($interaction){

            if($interaction->bookmark == 'yes'){

                $interaction->bookmark = 'no';
                $interaction->save();

            }else{

                $interaction->bookmark = 'yes';
                $interaction->save();

            }

        }else{

            Interaction::insert([
                'ip' => $user_ip,
                'post_id' => $req->post_id,
                'bookmark' => 'yes',
                'created_at' => Carbon::now()
            ]);

        }
    }

    public function show_bookmarks(){

        $IP = request()->ip();

        $bookmarks = Interaction::where('ip', $IP)->where('bookmark','yes')->paginate(6);

        return view('layouts/home', compact('bookmarks','IP'));

    }

    public function check_card(Request $req){

        $user_ip = Request()->ip();

        $interaction = Interaction::where('ip', $user_ip)->where('post_id', $req->post_id)->first();

        if($interaction){

            if($interaction->check == 'yes'){

                $interaction->check = 'no';
                $interaction->save();

            }else{

                $interaction->check = 'yes';
                $interaction->save();

            }
        
        }else{

            Interaction::insert([
                'ip' => $user_ip,
                'post_id' => $req->post_id,
                'check' => 'yes'
            ]);

        }
    }

}
