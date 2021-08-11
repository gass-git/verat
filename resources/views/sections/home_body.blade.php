<body style="background-color: #464660;">
    <div style="background-color:white;padding:50px 0 50px 0;min-height:calc(100vh - 70px - 150px);">
        <div class="mx-auto" style="width:90%;max-width:970px;">

            <div class="d-flex flex-wrap justify-content-center">
        
                @foreach($posts as $post)

                    @include('components/post_card')
                
                @endforeach

            </div>

            <div class="mt-4">{{ $posts->links() }}</div>

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