@php

@endphp

<div class="modal fade" id="edit-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Edit Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('edit_post='.$post_id) }}" method="post">
            @csrf
                <div class="modal-body">
                    <textarea class="form-control" id="message-text" name="content" rows="15">{{ $post->body }}</textarea>
                    <input name="post_id" value="{{ $post_id }}" style="display:none">
                    <button type="submit" class="btn btn-dark mt-3 mb-3" style="float:right">Save Changes</button>
                </div>

            </form>  

        </div>
    </div>
</div>