<div id="post-like" class="p-2" style="font-size:30px;display: inline-block; border-radius:50%;position:fixed; bottom:50px; right:50px;cursor:pointer;">
        
        @if($like)
        <i id="post-like-icon" class="fas fa-thumbs-up" style="color:blue;"></i>
        @else
        <i id="post-like-icon" class="fas fa-thumbs-up" style="color:rgb(196,196,196);"></i>
        @endif

</div>

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
</script>