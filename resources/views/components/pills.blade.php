<style>
    .pill{
        border-radius:5px;
        color:rgb(83, 83, 83);
        padding:6px 10px 0px 12px;
        width:100px;
    }
    .pill i{
        opacity:0.9;
        margin-right:20px;
    }
</style>

@php

    use App\Models\Comment;

    $comments_count = Comment::where('post_id', $post->id)->count();

@endphp

<div class="d-flex p-0" style="height:38px;">

    <!-- Views -->
    <div class="pill border mr-2" style="background-color: rgb(245, 231, 157,0.8);border:1px solid rgb(218, 202, 113)!important">
        <i class="far fa-eye"></i>{{ $post->views }}
    </div>
    
    <!-- Comments -->
    <div class="pill border mr-2" style="background-color: rgb(185, 128, 240,0.7);color:#fff;border:1px solid rgb(185, 128, 240,0.7)!important">
        <i class="fas fa-comment"></i>{{ $post->comments }}
    </div>
    
    <!-- Popularity -->
    <div class="pill border mr-0" style="background-color: rgb(254, 152, 152,0.6);color:#fff;border:1px solid rgb(254, 152, 152)!important">
        <i class="fas fa-thumbs-up"></i>{{ $post->likes }}
    </div>

</div>