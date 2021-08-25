<div class="d-flex flex-row comment-footer pt-3 mb-3">

    @auth
    
        @if($data->admin_praise === 'like')
            <div>
                <i id="{{ $data->id }}" class="fas fa-heart ml-4 mr-4" style="font-size:13px;color:rgb(255, 115, 115);cursor:pointer;"></i>
            </div>
        @else
            <div>
                <i id="{{ $data->id }}" class="fas fa-heart ml-4 mr-4" style="font-size:13px;color:rgb(196,196,196);cursor:pointer;"></i>
            </div>
        @endif

        @if(! $data->admin_reply)
            <div class="reply" id="{{ $data->id }}" data-toggle="modal" data-target="#reply-modal">
                Reply
            </div>
        @endif

    @endauth

    @guest

        <div class="ml-4" style="color:white;font-size:12px;">{{ $data->created_at }}</div>

        @if($data->admin_praise)
            <div class="pl-1" style="color:white;font-size:12px;">― the author <i class="fas fa-heart p-1" style="color:rgb(255, 115, 115)"></i> this</div>
        @endif

    @endguest


    @if($data->admin_reply)
        <div class="show-reply ml-auto pr-3" id="{{$data->id}}">Show reply <i class="far fa-comment-dots" style="padding:0 3px 0 5px"></i></div>
    @endif

</div>