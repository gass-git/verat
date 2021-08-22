<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Log;
use App\Models\Interaction;
use App\Models\Images;
use App\Models\PostVisit;
use App\Models\Post;
use App\Models\PraiseRecord;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function show($post_id){

        $user_ip = request()->ip();

        $post = Post::where('id', $post_id)->first();
        $post_id = $post->id;

        $comments = Comment::where('post_id', $post_id)->get();

        $visit_exists = PostVisit::where('ip',$user_ip)->where('post_id',$post_id)->first();

        if(!$visit_exists){

            $post->views += 1;
            $post->save();

            PostVisit::insert([
                'ip' => $user_ip,
                'post_id' => $post_id
            ]);

        }
   
        $like = PraiseRecord::where('ip', $user_ip)->where('post_id', $post_id)->first();
        $checked = Interaction::where('ip', $user_ip)->where('post_id', $post_id)->where('check', 'yes')->first();

        return view('layouts/post',compact('post','post_id','like','comments','checked'));

    }

    public function post_form(){
        
        return view('layouts/create_post');
    
    }

    const categories = ['laravel','javascript','html', 'css', 'php'];
    const fields = ['img','title','post'];

    public function insert(Request $req){

        foreach(self::fields as $input){
            
            if(empty($req->$input)){

                toast('Make sure to fill all fields.','info');
                return back()->withInput();

            }
        
        }

        $count = 0;

        foreach(self::categories as $category){

            if($req->$category){ $count++; }

        }

        if($count == 0){ 

            toast('You need to select at least one category.','info');
            return back()->withInput();

        }

        $img_new_name = date('dmy_H_s_i');

        $req->file('img')->storeAs('post-covers', $img_new_name, 'public');

        Post::insert([
            'title' => $req->title,
            'body' => $req->post,
            'cover_url' => 'http://verat.test/storage/post-covers/'.$img_new_name,
            'likes' => 0,
            'views' => 0,
            'comments' => 0,
            'created_at' => Carbon::now()
        ]);

        $post_id = Post::max('id');

        foreach(self::categories as $category){

            if($req->$category){

                Category::insert([
                    'post_id' => $post_id,
                    'category' => $req->$category
                ]);

            }
        }

        return redirect()->route('home');

    }

    public function upload_image(Request $req){

        $img_name = date('H_s_i');
        $folder = date('m_y');

        $req->file('post_img')->storeAs('post-images/'.$folder , $img_name, 'public');
        
        Images::insert([
            'url' => 'http://verat.test/storage/post-images/'.$folder.'/'.$img_name
        ]);

        return back();

    }

    public function delete_image(Request $req){

        Images::where('id', $req->img_id)->delete();

    }

    public function like_post(Request $req){

        $user_ip = Request()->ip();

        $post = Post::where('id',$req->post_id)->first();
        $like_exists = PraiseRecord::where('ip', $user_ip)->where('post_id', $post->id)->first();
        

        if($like_exists){
           
            PraiseRecord::where('ip', $user_ip)->where('post_id', $post->id)->first()->delete();
            
            $post->likes -= 1;
            $post->save();

        }else{

            PraiseRecord::insert([
                'ip' => $user_ip,
                'post_id' => $req->post_id
            ]);

            $post->likes += 1;
            $post->save();

        }

    }

    public function check_post(Request $req){

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

    public function post_comment(Request $req, $post_id){

        $user_ip = request()->ip();

        $post = Post::where('id', $post_id)->first();

        $post->comments += 1;
        $post->save();

        Comment::insert([
            'author_ip' => $user_ip,
            'author_name' => $req->name,
            'comment' => $req->comment,
            'post_id' => $post_id,
            'admin_praise' => null,
            'admin_reply' => null,
            'created_at' => Carbon::now()
        ]);

        if(empty($req->name)){
            $author = 'Someone';
        }else{
            $author = $req->name;
        }
       
        Log::insert([
            'from' => $author,
            'event' => 'wrote a comment',
            'post_id' => $req->post_id,
            'created_at' => Carbon::now()
        ]);

        toast("Comment sent!",'success');
        return back();

    }

    public function like_comment(Request $req){
        
        $comment_liked = Comment::where('id', $req->comment_id)->where('admin_praise', 'like')->first();
        $comment = Comment::where('id', $req->comment_id)->first();
        
        if($comment_liked){
            
            $comment->admin_praise = NULL;
            $comment->save();

        }else{

            $comment->admin_praise = 'like';
            $comment->save();
            
        }
    }

    public function reply_comment(Request $req){

        if(empty($req->msg)){

            toast('The reply could not be published because the message field is empty.','error');
            return back();
        }
        
        comment::where('id', $req->comment_id)
            ->update([
                'admin_reply' => $req->msg
            ]);
        
        toast('Reply successfuly published.','success');
        return back();

    }

}
