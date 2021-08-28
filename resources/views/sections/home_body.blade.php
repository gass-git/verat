<style>
    .card{
        border-radius: 0;
    }
    .card-img-top{
        border-radius: 0;
    }
    .bookmark-btn{
        position:absolute;
        right:10px;
        top:10px;
        border-radius:4px; 
        background-color:rgba(255, 255, 255, 0.8);
        width:30px;
        font-size:20px;
        text-align:center;
        z-index:99;
        cursor: pointer;
    }
    .bookmark-btn:hover{
        background-color:rgba(255, 255, 255, 0.9);
    }
    .check-btn{
        position:absolute;
        right:50px;
        top:10px;
        border-radius:4px; 
        background-color:rgba(255, 255, 255, 0.8);
        width:30px;
        font-size:20px;
        text-align:center;
        z-index:99;
    }
    .check-btn:hover{
        background-color:rgba(255, 255, 255, 0.9);
    }
    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #383838; 
        border-color: #2e2e2e; 
    }
    .page-link{
        color:#2e2e2e;
    }
</style>

<body style="background-color: #FAF1E6;min-width:443px;">
    <div style="padding:50px 0 50px 0;min-height:calc(99vh - 70px - 50px);">
        <div id="post-cards-wrapper" class="mx-auto" style="max-width:1060px;padding:0!important;">

            <div class="d-flex flex-wrap">
        
            @if(empty($bookmarks))
                
                @foreach($posts as $post)

                    @include('components/home/post_card')

                @endforeach
            
            </div>

            <div class="mt-4" style="margin-left:14px;">
                {{ $posts->links() }}
            </div>

            @else

                @foreach($bookmarks as $bookmark)

                    
@php
    
use App\Models\Interaction;
use App\Models\Category;
use App\Models\Post;

$post_id = $bookmark->post_id;

$post = Post::where('id',$post_id)->first();

dd($post);
 
$interaction = Interaction::where('ip', $IP)->where('post_id', $post_id)->first();
$categories = Category::where('post_id', $post_id)->get();

@endphp

<div class="card m-3 shadow-sm" style="width: 320px;">

<a href="post={{ $post_id }}+no_scroll">

    <img class="card-img-top" src="{{ $post->cover_url }}" height="170px" width="200px">

    <div class="card-body">
        
        <h5 class="card-title" style="margin: -10px 0 15px 0;color:black;height:70px;">{{ $post->title }}</h5>

        @include('components/home/pills')

    </div>  

    <div class="card-footer pt-2" style="background-color:rgb(247, 247, 247);border-radius:0;">

        <small class="text-muted" style="color:#2e2e2e!important;font-size:12px; opacity:0.8;">
            @if($post->updated_at)
                ― Updated on {{ date('F d, Y', strtotime($post->updated_at)) }}
            @else
                ― Written on {{ date('F d, Y', strtotime($post->created_at)) }}
            @endif
        </small>

        <div style="margin:-5px 0; float:right;color:#2e2e2e!important;font-size:25px;">

            @foreach($categories as $data)

                @if($data->category === 'laravel')
                    <i class="fab fa-laravel ml-1"></i>
                @endif
            
                @if($data->category === 'html')
                    <i class="fab fa-html5 ml-1"></i>
                @endif

                @if($data->category === 'javascript')
                    <i class="fab fa-js ml-1"></i>
                @endif

                @if($data->category === 'css')
                    <i class="fab fa-css3-alt ml-1"></i>
                @endif

                @if($data->category === 'php')
                    <i class="fab fa-php ml-1"></i>
                @endif

            @endforeach

        </div>

    </div>

</a>

{{-- Object exists? --}}
@if($interaction)

    @if($interaction->bookmark === 'yes')
        <div id="{{ $post->id }}" class="bookmark-btn" style="color:rgb(201, 82, 35);">
            <i class="fas fa-bookmark"></i>
        </div>
    @else
        <div id="{{ $post_id }}" class="bookmark-btn" style="color:rgb(196, 196, 196);">
            <i class="fas fa-bookmark"></i>
        </div> 
    @endif

    @if($interaction->check === 'yes')
        <div id="{{ $post_id }}" class="check-btn" style="color:rgb(20, 128, 56);">
            <i class="fas fa-check"></i>
        </div>
    @else
        <div id="{{ $post_id }}" class="check-btn" style="color:rgb(196, 196, 196);">
            <i class="fas fa-check"></i>
        </div>
    @endif

{{-- Object does not exist --}}
@else
        
    <div id="{{ $post_id }}" class="bookmark-btn" style="color:rgb(196, 196, 196);">
        <i class="fas fa-bookmark"></i>
    </div>    

    <div id="{{ $post_id }}" class="check-btn" style="color:rgb(196, 196, 196);">
        <i class="fas fa-check"></i>
    </div>

@endif


</div>


        
                @endforeach
            
            </div>

            <div class="mt-4" style="margin-left:14px;">
                {{ $bookmarks->links() }}
            </div>
                
            @endif

        </div>
    </div>    
</body>

<script src="js/card-hover-shadow.js"></script>

<script>

    let grey = 'rgb(196, 196, 196)';
    let red = 'rgb(201, 82, 35)';
    let green = 'rgb(20, 128, 56)';

$('.bookmark-btn').on('click',function(){

    let post_id = $(this).attr('id');
    let btn = $('#' + post_id + '.bookmark-btn');

    if(btn.css('color') === grey){
        btn.css('color', red);
    }else{
        btn.css('color', grey);
    }

    $.ajax({

        type: 'post',
        url: "{{ url('/bookmark') }}",
        data: {
            _token: "{{ csrf_token() }}", post_id: post_id
        },
        success:function(){
            // Do nothing
        },
        error:function(){
            console.log('AJAX error')
        }
    });

});

$('.check-btn').on('click',function(){

    let post_id = $(this).attr('id');
    let btn = $('#' + post_id + '.check-btn');

    if(btn.css('color') === grey){
        btn.css('color', green);
    }else{
        btn.css('color', grey);
    }

    $.ajax({

        type: 'post',
        url: "{{ url('/check_card') }}",
        data: {
            _token: "{{ csrf_token() }}", post_id: post_id
        },
        success:function(){
            // Do nothing
        },
        error:function(){
            console.log('AJAX error')
        }
    });

});
</script>