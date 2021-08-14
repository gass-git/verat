@php

    use App\Models\Images;

    $images = Images::orderBy('id','DESC')->take(5)->get();

@endphp

Last images uploaded

<div class="mb-5">

    @foreach($images as $img)

        <div class="list-group-item list-group-item-action" id="{{ $img->id }}">
            <img id="img-{{ $img->id }}" src="{{ $img->url }}" height="50px">
            <span class="delete-img float-right" style="cursor:pointer">Delete</span>
            <span class="listed-img float-right mr-5" style="cursor:pointer">Use image</span>
        </div>

    @endforeach

</div>

<script>

    $('.listed-img').on('click', function(){
        
        let id = $(this).parent().attr('id');

        img_element = $('#img-' + id);

        let url = img_element.attr('src');

        $('#textarea').val(function(i, text) {
        return text + ' <img src="' + url + '" />';
        });

    });

    $('.delete-img').on('click', function(){
        
        let id = $(this).parent().attr('id');

        $.ajax({
            type:'post',
            url: "{{ url('/delete_image') }}",
            data:{ _token: "{{ csrf_token() }}", img_id: id },
            success:function(){
                $('#'+id).css('display','none');
            },
            error:function(){
                console.log('AJAX error')   
            }
        });

    });

</script>