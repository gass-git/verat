<style>
    .pill{
        width:70px;
        border-radius:5px;
        color:black;
    }
</style>

<div class="d-flex pr-1 pl-0" style="height:38px;">

    <!-- Views -->
    <div class="pill border mr-2 p-2"><i class="far fa-eye mr-2"></i>{{ $post->views }}</div>
    
    <!-- Comments -->
    <div class="pill border mr-2 p-2"><i class="fas fa-comment mr-2"></i>123</div>
    
    <!-- Popularity -->
    <div class="pill border mr-2 p-2"><i class="far fa-thumbs-up mr-2"></i>{{ $post->claps }}</div>

</div>