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

<body style="background-color: #f6f8fa;">
    <div style="padding:50px 0 50px 0;min-height:calc(99vh - 70px - 50px);">
        <div class="mx-auto" style="width:90%;max-width:1170px;">

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
                    
                        $post = App\Models\Post::where('id', $bookmark->post_id)->first();

                    @endphp

                    @include('components/home/post_card')
        
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