<style>
    #snippet {
        width: 100%;
        max-width:680px;
        height: auto;
    }
    </style>
    
    <body style="background-color: #f6f8fa;">
        <div class="mx-auto" style="width:70%;margin-top:70px;min-height:80vh;max-width:800px;">
        
            <h3 class="pb-1 ml-2">Summary</h3>

            <div class="row p-3 mb-5 border" style="margin:10px 3px 10px 3px;border-radius:5px;">

                <div class="col-sm-4" style="text-align:center;border-right: 1px solid rgb(216, 216, 216);">
                    <div class="pt-4" >12</div>
                    <div class="pt-2" >Posts</div>
                </div>

                <div class="col-sm-4" style="text-align:center;border-right: 1px solid rgb(216, 216, 216);">
                    <div class="pt-4" >12</div>
                    <div class="pt-2" >Likes</div>
                </div>

                <div class="col-sm-4" style="text-align:center;">
                    <div class="pt-4" >12</div>
                    <div class="pt-2" >Comments</div>
                </div>

            </div>    

            <h3 class="ml-2">Recent Activity</h3>
            
                <div class="list-group mt-3 mb-5">

                    @if(empty($logs->event))
                            
                        <div class="list-group-item list-group-item-action">No recent activity</div>
                
                    @else

                        @foreach($logs as $log)

                            <a href="{{ url('/post='.$log->post_id) }}" class="list-group-item list-group-item-action">
                                <span style="text-transform:capitalize;"><b>{{ $log->from }}</b></span>
                                <span>{{ $log->event }}</span>
                                <span>on post {{ $log->post_id }}</span>
                                <span style="float:right">{{ $log->created_at }}</span>
                            </a>
                            
                        @endforeach
                        
                    @endif

                </div>

        </div>
    </body>  