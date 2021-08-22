<div class="modal fade" id="reply-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('reply_comment') }}" method="post">
            @csrf
                <div class="modal-body">
                    <textarea class="form-control" id="message-text" name="msg" rows="5" style="resize: none"></textarea>
                    <input id="comment_id" name="comment_id" value="" style="display:none">
                    <button type="submit" class="btn btn-dark mt-3 mb-3" style="float:right">Reply</button>
                </div>

            </form>  

        </div>
    </div>
</div>