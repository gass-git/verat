<style>
    .form-wrapper{
        width:90%;
        max-width:970px;
        margin:70px 0 50px 0;
    }
</style>

<div class="form-wrapper mx-auto">
    <form action="{{ url('/create_post') }}" method="post" enctype="multipart/form-data">
    @csrf    
        <div class="form-group">
            <label>Cover image</label>
            <input name="img" type="file" class="form-control-file" >
        </div>

        <div class="form-group">
            <label>Category</label>
            <input name="category" class="form-control">
        </div>

        <div class="form-group">
            <label>Title</label>
            <input name="title" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Post body</label>
            <textarea name="post" class="form-control" rows="15"></textarea>
        </div>

        <button type="submit">Save</button>

    </form>
</div>    