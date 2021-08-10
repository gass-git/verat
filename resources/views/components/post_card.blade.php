<a href="post={{ $post->id }}" class="card m-3" style="width: 18rem;">
    <img class="card-img-top" src="{{ $post->image }}">
    <div class="card-body">
        
        <h5 class="card-title" style="color:black">{{ $post->title }}</h5>

        @include('components/pills')

    </div>  
    <div class="card-footer">
        <small class="text-muted">Written: {{ date('F d, Y', strtotime($post->created_at)) }}</small>
    </div>
</a>