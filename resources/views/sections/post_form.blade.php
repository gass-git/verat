<style>
    .form-wrapper{
        width:90%;
        max-width:970px;
    }
</style>

<body style="background-color: #f6f8fa;">
    <div style="min-height:calc(99vh - 70px - 50px);">
        <div class="form-wrapper mx-auto pt-5">

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
                    <textarea id="textarea" name="post" class="form-control" rows="10"></textarea>
                </div>

                <button type="submit">Save</button>

            </form>

            <div class="mt-4 mb-4">
                <form action="{{ url('/upload_image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>Upload post image</label>
                            <input name="post_img" type="file" class="form-control-file" >
                        </div>

                        <button type="submit">upload</button>

                </form>
            </div>

            @include('components/latest_img_uploads')

        </div> 
    </div>       
</body>    