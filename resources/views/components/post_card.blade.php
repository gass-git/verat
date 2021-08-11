<style>
    .card{
        border-radius: 0;
    }
    .card-img-top{
        border-radius: 0;
    }
</style>

<a href="post={{ $post->id }}" class="card m-3" style="width: 18rem;">
    
    <img class="card-img-top" src="{{ $post->cover_url }}" height="170px" width="200px">
    <div class="card-body">
        
        <h5 class="card-title" style="color:black">{{ $post->title }}</h5>

        @include('components/pills')

    </div>  
    <div class="card-footer" style="background-color:#FE9898">
        <small class="text-muted" style="color:white!important">Written: {{ date('F d, Y', strtotime($post->created_at)) }}</small>
    </div>

</a>