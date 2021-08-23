<style>
    .comment-box{
        background-color:#2e2e2e;
        border-radius:5px;
    }
    .comment-box b{
        color:#28FFBF;
        text-transform: capitalize;
    }
    .comment-box p{
        color:white;
    }
    .comment-footer{
        border-top:1px dashed rgb(177, 177, 177);
        height:55px;
    }
    .reply{
        cursor:pointer;
        font-size:13px;
        color:white;
        padding-top:2px;
    }
    .reply-box{
        background-color:#334756;
        border-radius:5px;
        color:#F5FDB0;
    }
    .reply-box p{
        color:white;
    }
    .show-reply{
        color:white;
        cursor:pointer;
        font-size:12px;
    }
</style>

<div class="mt-5" style="max-width:680px;">

    @foreach($comments as $data)

        <div class="comment-box pt-3">

            @if($data->author_name)
                <b class="ml-4 mb-2">{{ $data->author_name }}</b>
            @else
                <b class="ml-4 mb-2"> Someone </b>
            @endif
                
                <p class="ml-4 mr-0">{{ $data->comment }}</p>

                @include('components/comment_footer')

        </div>
        
        @if($data->admin_reply)

            <div id="reply_comment_id_{{$data->id}}" class="reply-box mb-3 pl-3 pr-3 pt-3 pb-1" style="display:none">
                <b>Gass (Admin)</b>
                <p>{{ $data->admin_reply }}</p>
            </div>

        @endif
     
    @endforeach

</div>

@include('components/reply_modal')

<script>

    /* 
     * Add the comment id to the hidden input on the modal
     * for backend purposes.
     *
     */
    $('.reply').click(function(){

        let id = $(this).attr('id');
        $('#comment_id').attr('value', id);
    });

    $('.show-reply').click(function(){

        let id = $(this).attr('id');
        let element = $('#reply_comment_id_' + id);

        if(element.css('display') == 'none'){
            element.css('display','block');
            $(this).html('Hide reply <i class="far fa-comment-dots" style="padding:0 3px 0 5px"></i>');
        }else{
            element.css('display','none');
            $(this).html('Show reply <i class="far fa-comment-dots" style="padding:0 3px 0 5px"></i>');
        }

    })

    $('.fa-heart').click(function(){

        var id = $(this).attr('id');       
        var icon = $('#' + id);              

        console.log('works')

        if(icon.css('color') == 'rgb(196, 196, 196)'){
            icon.css('color','rgb(255, 115, 115)')
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