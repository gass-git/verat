<style>
.post-body p{
    color:grey;
    line-height:30px;
    text-align:justify;
    font-size:20px;
}
</style>

<body style="background-color: #f6f8fa;">
    
    <div class="mx-auto" style="margin-top:70px;min-height:80vh;max-width:680px;">
    
        <!-- Title -->
        <div>
            <h1>
                {{ $post->title }}
            </h1>
            <div style="margin-top:-10px">
                {{ date('F d, Y', strtotime($post->created_at)) }}
            </div>
        </div>

        <div class="post-body mt-4">
            
                {!! $post->body !!}
               
        </div>
        
        <div class="d-flex" section="comments" style="height:60px;margin:50px 0 0 0;">

            @if($comments_count > 0)
                <button class="btn btn-primary mr-3" style="width:200px;" id="show-comments-btn" data-toggle="collapse" href="#collapseComments" role="button" aria-expanded="false" aria-controls="collapseComments">
                    <i class="fas fa-comments mr-2"></i>Show Comments
                </button>
            @endif

            <button class="btn btn-dark" style="width:200px;" data-toggle="modal" data-target="#comment-modal">
                <i class="fas fa-pen-alt mr-2"></i>Write a Comment
            </button>

        </div>

        <div class="collapse" id="collapseComments" style="border:1px solid transparent;">
            @include('components/post/comments')
        </div>

        <!-- Add space from the bottom of the page -->
        <div style="height:50px;" id="bottom-div"></div>

        @include('components/post/comment_modal')

    </div>

    @include('components/post/check_btn')
    @include('components/post/like_post_btn')

</body>    

<script>

$('#collapseComments').on('show.bs.collapse',function(){

    console.log('it works')

    $('#show-comments-btn').html('<i class="fas fa-comments mr-2"></i>Hide Comments');
    $('html,body').animate({ scrollTop: 99999 }, 'slow');

});

$('#collapseComments').on('hide.bs.collapse',function(){

    $('#show-comments-btn').html('<i class="fas fa-comments mr-2"></i>Show Comments');

});

@if($scroll)
    $(document).ready(function () {
        $('html,body').animate({ scrollTop: 99999 }, 'slow');
    });
@endif



</script>
