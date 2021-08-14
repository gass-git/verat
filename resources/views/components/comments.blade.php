<div class="mt-5" style="max-width:650px;">

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

<script>
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