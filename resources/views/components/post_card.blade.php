<style>
   
</style>

@php
    
    use App\Models\Interaction;

    $interaction = Interaction::where('ip', $IP)->where('post_id', $post->id)->first();

@endphp

<div class="card m-3 shadow-sm" style="width: 320px;">
    
    <a href="post={{ $post->id }}">

        <img class="card-img-top" src="{{ $post->cover_url }}" height="170px" width="200px">
    
        <div class="card-body">
            
            <h5 class="card-title" style="color:black;height:70px;">{{ $post->title }}</h5>

            @include('components/pills')

        </div>  

        <div class="card-footer" style="background-color:rgb(247, 247, 247);border-radius:0;">

            <small class="text-muted" style="color:#2e2e2e!important">― Written on {{ date('F d, Y', strtotime($post->created_at)) }}</small>

        </div>

    </a>

    {{-- Object exists? --}}
    @if($interaction)

        @if($interaction->bookmark === 'yes')
            <div id="{{ $post->id }}" class="bookmark-btn" style="color:rgb(201, 82, 35);">
                <i class="fas fa-bookmark"></i>
            </div>
        @else
            <div id="{{ $post->id }}" class="bookmark-btn" style="color:rgb(196, 196, 196);">
                <i class="fas fa-bookmark"></i>
            </div> 
        @endif

        @if($interaction->check === 'yes')
            <div id="{{ $post->id }}" class="check-btn" style="color:rgb(20, 128, 56);">
                <i class="fas fa-check"></i>
            </div>
        @else
            <div id="{{ $post->id }}" class="check-btn" style="color:rgb(196, 196, 196);">
                <i class="fas fa-check"></i>
            </div>
        @endif

    {{-- Object does not exist --}}
    @else
            
        <div id="{{ $post->id }}" class="bookmark-btn" style="color:rgb(196, 196, 196);">
            <i class="fas fa-bookmark"></i>
        </div>    

        <div id="{{ $post->id }}" class="check-btn" style="color:rgb(196, 196, 196);">
            <i class="fas fa-check"></i>
        </div>

    @endif


</div>

