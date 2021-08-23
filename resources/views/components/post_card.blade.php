<style>
   
</style>

@php
    
    use App\Models\Interaction;
    use App\Models\Category;

    if($post->post_id){

        $post_id = $post->post_id;

    }else{

        $post_id = $post->id;

    }

    $interaction = Interaction::where('ip', $IP)->where('post_id', $post_id)->first();
    $categories = Category::where('post_id', $post_id)->get();

@endphp

<div class="card m-3 shadow-sm" style="width: 320px;">
    
    <a href="post={{ $post_id }}+no_scroll">

        <img class="card-img-top" src="{{ $post->cover_url }}" height="170px" width="200px">
    
        <div class="card-body">
            
            <h5 class="card-title" style="color:black;height:70px;">{{ $post->title }}</h5>

            @include('components/pills')

        </div>  

        <div class="card-footer pt-2" style="background-color:rgb(247, 247, 247);border-radius:0;">

            <small class="text-muted" style="color:#2e2e2e!important;font-size:12px; opacity:0.8;">― Written on {{ date('F d, Y', strtotime($post->created_at)) }}</small>

            <div style="margin:-5px 0; float:right;color:#2e2e2e!important;font-size:25px;">

                @foreach($categories as $data)

                    @if($data->category === 'laravel')
                        <i class="fab fa-laravel ml-1"></i>
                    @endif
                
                    @if($data->category === 'html')
                        <i class="fab fa-html5 ml-1"></i>
                    @endif

                    @if($data->category === 'javascript')
                        <i class="fab fa-js ml-1"></i>
                    @endif

                    @if($data->category === 'css')
                        <i class="fab fa-css3-alt ml-1"></i>
                    @endif

                    @if($data->category === 'php')
                        <i class="fab fa-php ml-1"></i>
                    @endif

                @endforeach

            </div>

        </div>

    </a>

    {{-- Object exists? --}}
    @if($interaction)

        @if($interaction->bookmark === 'yes')
            <div id="{{ $post->id }}" class="bookmark-btn" style="color:rgb(201, 82, 35);">
                <i class="fas fa-bookmark"></i>
            </div>
        @else
            <div id="{{ $post_id }}" class="bookmark-btn" style="color:rgb(196, 196, 196);">
                <i class="fas fa-bookmark"></i>
            </div> 
        @endif

        @if($interaction->check === 'yes')
            <div id="{{ $post_id }}" class="check-btn" style="color:rgb(20, 128, 56);">
                <i class="fas fa-check"></i>
            </div>
        @else
            <div id="{{ $post_id }}" class="check-btn" style="color:rgb(196, 196, 196);">
                <i class="fas fa-check"></i>
            </div>
        @endif

    {{-- Object does not exist --}}
    @else
            
        <div id="{{ $post_id }}" class="bookmark-btn" style="color:rgb(196, 196, 196);">
            <i class="fas fa-bookmark"></i>
        </div>    

        <div id="{{ $post_id }}" class="check-btn" style="color:rgb(196, 196, 196);">
            <i class="fas fa-check"></i>
        </div>

    @endif


</div>

