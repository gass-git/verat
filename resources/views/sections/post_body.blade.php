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

        <h5 class="mt-4" style="color:grey;line-height:30px;">
            
            <p>
                {!! nl2br($post->body) !!} 
            </p>    
        
        </h5>
        

        <div class="mt-5">
            
           @foreach($comments as $data)

                @if($data->author_name)
                    <b>{{ $data->author_name }}</b>
                @else
                    <b> Someone </b>
                @endif
                    
                    <p>{{ $data->comment }}</p>

                    @auth
                    
                        @if($data->admin_praise === 'like')
                            <p><i id="{{ $data->id }}" class="fas fa-heart" style="color:rgb(253, 53, 53);cursor:pointer;"></i></p>
                        @else
                            <p><i id="{{ $data->id }}" class="fas fa-heart" style="color:rgb(196,196,196);cursor:pointer;"></i></p>
                        @endif

                    
                    @endauth

                @if($data->admin_reply)
                    <div class="ml-5">
                        <b>Admin</b>

                        <p>{{ $data->admin_reply }}</p>

                    </div>
                @endif

           @endforeach
        
        </div>

           <div class="p-3 mt-5" style="max-width:500px;border:1px solid #d1d1d1; border-radius:5px;">

            <form action="/post_comment={{ $post->id }}" method="post">
            @csrf    
                
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter name (optional)">
                </div>
        
                <textarea class="form-control" name="comment" rows="3"></textarea>
                
                <button class="mt-3 btn btn-light" style="border:1px solid #d1d1d1;" type="submit">Publish</button>

            </form>
    
        </div>  

    </div>


    <div id="post-like" class="p-2" style="font-size:30px;display: inline-block; border-radius:50%;position:fixed; bottom:50px; right:50px;cursor:pointer;">
        
        @if($like)
        <i id="post-like-icon" class="fas fa-thumbs-up" style="color:blue;"></i>
        @else
        <i id="post-like-icon" class="fas fa-thumbs-up" style="color:rgb(196,196,196);"></i>
        @endif

    </div>
</body>    

<script>
    $('#post-like').on('click',function(){

        let icon = $('#post-like-icon');

        if(icon.css('color') == 'rgb(196, 196, 196)'){
            icon.css('color','blue')
        }else{
            icon.css('color','rgb(196, 196, 196)')
        }
      
        $.ajax({
            type:'post',
            url:"{{ url('/like_post') }}",
            data:{
                _token: "{{ csrf_token() }}", post_id: @json($post_id)
            },
            success:function(){
                // Do nothing
            },
            error:function(){  
                console.log('AJAX error')   
            }
        })

    });

    $('.fa-heart').click(function(){

        var id = $(this).attr('id');       
        var icon = $('#' + id);              

        console.log('works')

        if(icon.css('color') == 'rgb(196, 196, 196)'){
            icon.css('color','rgb(253, 53, 53)')
        }else{
            icon.css('color','rgb(196, 196, 196)')
        }

    
        $.ajax({
            type:'post',
            url:"{{ url('/like_comment') }}",
            data:{
                _token: "{{ csrf_token() }}", comment_id: id
            },
            success:function(){
                // Do nothing
            },
            error:function(){  
                console.log('AJAX error')   
            }
        })
        
    });

</script>
