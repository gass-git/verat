<div class="modal fade" id="comment-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/post_comment={{ $post->id }}" method="post">
            @csrf
                <div class="modal-body">
                    <input type="text" name="name" class="form-control" placeholder="Enter name (optional)">
                    <textarea class="form-control mt-3" name="comment" rows="3" style="resize:none"></textarea>
                    <button type="submit" class="btn btn-dark mt-3 mb-3" style="float:right">Publish</button>
                </div>

            </form>  

        </div>
    </div>
</div>