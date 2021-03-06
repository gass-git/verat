<style>
#post-wrapper{
    margin-top:70px;
    min-height:80vh;
    max-width:680px;
    min-width: 443px;;
}
.post-body p{
    margin:25px 0 20px 0;
    color:grey;
    line-height:30px;
    text-align:justify;
    font-size:18px;
}
h1{
    font-size:37px;
}
h5{
    margin:30px 0 20px 0;
}
#post-wrapper a{
    font-weight: 500;
    color:#2e71ff!important;
}
#post-wrapper a:hover{
    color:#6a99fd!important;
}

</style>

<body style="background-color: #FAF1E6;">
    
    <div id="post-wrapper" class="mx-auto pl-5 pr-5">
    
        <!-- Title -->
        <div>
            <h1>
                {{ $post->title }}
            </h1>
            <div style="margin-top:-10px">
                
                {{-- Since the posts are normally edited a number of times when they are being written,
                    the updated_at field gets updated many times and so if there is not a special
                    conditional statement all the posts will show as updated. This is the 
                    reason behind this conditional statement, which shows the post as updated only
                    if the days aparts between the updated date and created date are more than 7 days --}}
                @php
                    $days_apart = round(strtotime($post->updated_at) - strtotime($post->created_at))/86400;    
                @endphp

                @if( $days_apart > 7 )
                   Updated on 
                @else
                   Written on 
                @endif

                {{ date('F d, Y', strtotime($post->updated_at)) }}

            </div>
        </div>

        <div class="post-body mt-4">
            
                {!! $post->body !!}
               
        </div>
        
        
        <div class="d-flex" section="comments" style="height:60px;margin:50px 0 0 0;">

            @if($comments_count > 0)
                <button class="btn btn-primary mr-3" style="width:180px;" id="show-comments-btn" data-toggle="collapse" href="#collapseComments" role="button" aria-expanded="false" aria-controls="collapseComments">
                    <i class="fas fa-comments mr-2"></i>Show Comments
                </button>
            @endif

            <button class="btn btn-dark mr-3" style="width:190px;" data-toggle="modal" data-target="#comment-modal">
                <i class="fas fa-pen-alt mr-2"></i>Write a Comment
            </button>

            @auth
                <button class="btn btn-info" style="width:130px;" data-toggle="modal" data-target="#edit-modal">
                    <i class="fas fa-edit mr-2"></i> Edit Post
                </button>    
            @endauth

        </div>

        <div class="collapse" id="collapseComments" style="border:1px solid transparent;">
            @include('components/post/comments')
        </div>

        <!-- Add space from the bottom of the page -->
        <div style="height:50px;" id="bottom-div"></div>

        @include('components/post/edit_post_modal')
        @include('components/post/comment_modal')

    </div>

    <div id="praise-btns">
        @include('components/post/check_btn')
        @include('components/post/like_post_btn')
    </div>

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
