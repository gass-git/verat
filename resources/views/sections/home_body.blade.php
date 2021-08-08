<body style="background-color:rgb(255, 255, 255)">
    
    <div class="mx-auto" style="width:70%;margin-top:70px">
   
        <div class="d-flex flex-wrap">
        
            <a href="#" class="card m-3" style="width: 18rem;">
                <img class="card-img-top" src="images/cover-sample.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title" style="color:black">Card title</h5>
                    @include('components/pills')
                </div>  
                <div class="card-footer">
                    <small class="text-muted">Written: July 2, 2021 </small>
                </div>
            </a>

            <a href="#" class="card m-3" style="width: 18rem;">
                <img class="card-img-top" src="images/cover-sample.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title" style="color:black">Card title</h5>
                    @include('components/pills')
                </div>  
                <div class="card-footer">
                    <small class="text-muted">Written: July 2, 2021 </small>
                </div>
            </a>

            <a href="#" class="card m-3" style="width: 18rem;">
                <img class="card-img-top" src="images/cover-sample.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title" style="color:black">Card title</h5>
                    @include('components/pills')
                </div>  
                <div class="card-footer">
                    <small class="text-muted">Written: July 2, 2021 </small>
                </div>
            </a>

            <a href="#" class="card m-3" style="width: 18rem;">
                <img class="card-img-top" src="images/cover-sample.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title" style="color:black">Card title</h5>
                    @include('components/pills')
                </div>  
                <div class="card-footer">
                    <small class="text-muted">Written: July 2, 2021 </small>
                </div>
            </a>

            <a href="#" class="card m-3" style="width: 18rem;">
                <img class="card-img-top" src="images/cover-sample.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title" style="color:black">Card title</h5>
                    @include('components/pills')
                </div>  
                <div class="card-footer">
                    <small class="text-muted">Written: July 2, 2021 </small>
                </div>
            </a>
            
        </div>    
    
    </div>
    
</body>

<script>
    $(document).ready(function(){
        // -- card hover effect -------
        $(".card").hover(
            function() { $(this).addClass('shadow').css('cursor', 'pointer') }, 
            function() { $(this).removeClass('shadow') }
        );
        // ----------------------------
    });
</script>