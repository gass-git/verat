
<div class="p-3" style="margin:50px 0 100px 0; max-width:650px;border:1px solid #d1d1d1; border-radius:5px;">
    
    <form action="/post_comment={{ $post->id }}" method="post">
    @csrf    
        
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter name (optional)">
        </div>

        <textarea class="form-control" name="comment" rows="3"></textarea>
        
        <button class="mt-3 btn btn-light" style="border:1px solid #d1d1d1;" type="submit">Publish</button>

    </form>
    
</div> 