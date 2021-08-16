<style>
#snippet {
    width: 100%;
    max-width:680px;
    height: auto;
}
</style>

<body style="background-color: #f6f8fa;">
    
    <div class="mx-auto" style="width:70%;margin-top:70px;min-height:80vh;max-width:800px;">
    
        <!-- Title -->
        <div>
            <h1>
                {{ $post->title }}
            </h1>
            <div style="margin-top:-10px">
                {{ date('F d, Y', strtotime($post->created_at)) }}
            </div>
        </div>

        <h5 class="mt-4" style="color:grey;line-height:30px;margin-right:150px;text-align:justify">
            
            <p>
                {!! nl2br($post->body) !!} 
            </p>    
        
        </h5>
            
        @include('components/comments')
    
        @include('components/comment_form')

    </div>

    @include('components/check_btn')
    @include('components/like_post_btn')

</body>    


