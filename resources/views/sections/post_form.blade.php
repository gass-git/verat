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
                    <label>Title</label>
                    <input name="title" class="form-control" value="{{ old('title') }}" >
                </div>

                <div class="form-group">
                    <label>Post body</label>
                    <textarea id="textarea" name="post" class="form-control" rows="10">{{ old('post') }}</textarea>
                </div>


                <div class="form-group">
                    <label style="font-size:15px">Select Categories</label>
                    <div class="mb-2 mt-2" style="font-size:30px">
                
                        @include('components/categories')
            
                    </div>
                </div>

                <button class="btn btn-dark mt-3" type="submit">Publish Post</button>

            </form>

            <div class="mt-4 mb-4">
                <form action="{{ url('/upload_image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>Upload post image</label>
                            <input name="post_img" type="file" class="form-control-file" >
                        </div>

                        <button class="btn btn-dark mt-3" type="submit">upload</button>

                </form>
            </div>

            @include('components/latest_img_uploads')

        </div> 
        
    </div>       
</body>    