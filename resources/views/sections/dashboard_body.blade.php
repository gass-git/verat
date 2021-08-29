<style>
    .dashboard-container{
        width:70%;
        margin-top:70px;
        min-height:80vh;
        max-width:800px;
    }
    .dashboard-container .col-sm-4{
        text-align:center;
        border-right: 1px solid rgb(216, 216, 216);
    }
    .dashboard-container .row{
        margin:10px 3px 50px 3px;
        border-radius:5px;
    }
    body{
        background-color: #FAF1E6;
    }
</style>
    
<body>
    <div class="dashboard-container mx-auto">
    
        <h3 class="pb-1 ml-2">Summary</h3>

        <div class="row p-3 border">

            <div class="col-sm-4">
                <div class="pt-4" >12</div>
                <div class="pt-2" >Posts</div>
            </div>

            <div class="col-sm-4">
                <div class="pt-4" >12</div>
                <div class="pt-2" >Likes</div>
            </div>

            <div class="col-sm-4" style="border-right: none">
                <div class="pt-4" >12</div>
                <div class="pt-2" >Comments</div>
            </div>

        </div>    

        <h3 class="ml-2">
            Recent Activity
        </h3>
        
        <div class="list-group mt-3 mb-5">

            @if($logs_count > 0)
                    
                @foreach($logs as $log)

                    <a href="/post={{$log->post_id}}+scroll" class="list-group-item list-group-item-action">
                        
                        <span style="text-transform:capitalize;"><b>{{ $log->from }}</b></span>
                        <span>{{ $log->event }}</span>
                        <span>on post {{ $log->post_id }}</span>
                        <span style="float:right">{{ $log->created_at }}</span>
                    
                    </a>
                
                @endforeach
        
            @else

                <div class="list-group-item list-group-item-action">No recent activity</div>
                
            @endif

        </div>

    </div>
</body>  