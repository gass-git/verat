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
        </div>

        <h5 class="mt-4" style="color:grey;line-height:30px;">
            
            <p>
                {!! nl2br($post->body) !!} 
            </p>    
        
        </h5>
        
    </div>
    <div id="like" class="p-2" style="font-size:30px;display: inline-block; border-radius:50%;position:fixed; bottom:50px; right:50px;cursor:pointer;">
        
        @if($like)
        <i id="like-icon" class="fas fa-thumbs-up" style="color:blue;"></i>
        @else
        <i id="like-icon" class="fas fa-thumbs-up" style="color:rgb(196,196,196);"></i>
        @endif

    </div>
</body>    

<script>
    $('#like').on('click',function(){

        if($('#like-icon').css('color') == 'rgb(196, 196, 196)'){
            $('#like-icon').css('color','blue')
        }else{
            $('#like-icon').css('color','rgb(196, 196, 196)')
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
</script>
