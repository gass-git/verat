<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Post;

class DashboardController extends Controller
{
    public function show()
    {

        $logs = Log::orderBy('id', 'DESC')->take(10)->get();
        $logs_count = Log::count();
        $total_posts = Post::all()->count();
        $total_likes = Post::sum('likes');
        $total_comments = Post::sum('comments');

        return view('layouts/dashboard', compact(
            'logs',
            'logs_count',
            'total_posts',
            'total_likes',
            'total_comments'
        ));
    }
}
