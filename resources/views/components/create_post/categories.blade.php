<style>
    .category-box{
        cursor:pointer;
        border-radius:5px;
        width:50px;
        text-align:center;
        border:1px solid #c7c7c7;
        opacity:0.9;
    }
    .category-box:hover{
        border:1px solid #999999;
        opacity:1;
    }
</style>

<div class="form-check form-check-inline">
                        
    <label id="laravel-box" class="form-check-label category-box">
        <input class="form-check-input" type="checkbox" name="laravel" value="laravel" style="display:none">
        <i class="fab fa-laravel"></i>
    </label>

</div>

<div class="form-check form-check-inline">
    
    <label id="javascript-box" class="form-check-label category-box">
        <input class="form-check-input" type="checkbox" name="javascript" value="javascript" style="display:none">
        <i class="fab fa-js"></i>
    </label>

</div>


<div class="form-check form-check-inline">
    
    <label id="html-box" class="form-check-label category-box">
        <input class="form-check-input" type="checkbox" name="html" value="html" style="display:none">
        <i class="fab fa-html5"></i>
    </label>

</div>

<div class="form-check form-check-inline">
    
    <label id="css-box" class="form-check-label category-box">
        <input class="form-check-input" type="checkbox" name="css" value="css" style="display:none">
        <i class="fab fa-css3-alt"></i>
    </label>

</div>

<div class="form-check form-check-inline">
    
    <label id="php-box" class="form-check-label category-box">
        <input class="form-check-input" type="checkbox" name="php" value="php" style="display:none">
        <i class="fab fa-php"></i>
    </label>

</div>

<div class="form-check form-check-inline">
    
    <label id="inspiration-box" class="form-check-label category-box">
        <input class="form-check-input" type="checkbox" name="inspiration" value="inspiration" style="display:none">
        <i class="far fa-lightbulb"></i>
    </label>

</div>

<script>
    $('.form-check-input').on('click', function(){
        
        let id = $(this).parent().attr('id');
        let box = $('#' + id);

        if( $(this).is(':checked') ){

            box.css('background-color','#f0b0b0');
            box.css('border','1px solid #999999');

        }else{

            box.removeAttr( 'style' );
           
        }
    });
</script>