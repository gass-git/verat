<body>
    <div class="mx-auto" style="width:90%;max-width:970px;margin-top:70px;">
        <div class="d-flex flex-wrap justify-content-center">
      
            @foreach($posts as $post)

                @include('components/post_card')
            
            @endforeach

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