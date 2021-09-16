<div id="check" class="p-2" style="font-size:30px;display: inline-block; border-radius:50%;position:fixed; bottom:100px; right:50px;cursor:pointer;">
        
    @if($checked)
            <i id="check-icon" class="fas fa-check" style="color:rgb(20, 128, 56);" data-toggle="tooltip" data-placement="top" title="Post read"></i>
    @else
            <i id="check-icon" class="fas fa-check" style="color:rgb(196,196,196);" data-toggle="tooltip" data-placement="top" title="Mark this post as read"></i>
    @endif

</div>

<script>
    $('#check').on('click',function(){

            let icon = $('#check-icon');

            if(icon.css('color') == 'rgb(196, 196, 196)'){
                    icon.css('color','rgb(20, 128, 56)');
                    icon.attr('data-original-title','Post read');
            }else{
                    icon.css('color','rgb(196, 196, 196)');
                    icon.attr('data-original-title','Mark this post as read');
            }

            icon.tooltip('hide');

            $.ajax({
            type:'post',
            url:"{{ url('/check_post') }}",
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