<style>
    .pill{
        width:70px;
        border-radius:5px;
        color:black;
    }
</style>

@php

    use App\Models\Comment;

    $comments_count = Comment::where('post_id', $post->id)->count();

@endphp

<div class="d-flex pr-1 pl-0" style="height:38px;">

    <!-- Views -->
    <div class="pill border mr-2 p-2" style="background-color: #F5E79D"><i class="far fa-eye mr-2"></i>{{ $post->views }}</div>
    
    <!-- Comments -->
    <div class="pill border mr-2 p-2" style="background-color: #B980F0;color:white"><i class="fas fa-comment mr-2"></i>{{ $comments_count }}</div>
    
    <!-- Popularity -->
    <div class="pill border mr-2 p-2" style="background-color: #E5FBB8"><i class="far fa-thumbs-up mr-2"></i>{{ $post->likes }}</div>

</div>