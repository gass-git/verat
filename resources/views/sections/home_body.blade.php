<body style="background-color: #f6f8fa;">
    <div style="padding:50px 0 50px 0;min-height:calc(99vh - 70px - 50px);">
        <div class="mx-auto" style="width:90%;max-width:970px;">

            <div class="d-flex flex-wrap">
        
                @foreach($posts as $post)

                    @include('components/post_card')
                
                @endforeach

            </div>

            <div class="mt-4" style="margin-left:14px;">
                {{ $posts->links() }}
            </div>

        </div>
    </div>    
</body>

<script>
    $(document).ready(function(){
        $(".card").hover(
            function() { $(this).addClass('shadow').css('cursor', 'pointer') }, 
            function() { $(this).removeClass('shadow') }
        );
    });
</script>