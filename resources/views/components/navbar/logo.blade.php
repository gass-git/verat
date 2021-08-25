<style>
.logo{
    width: 42px;
    display: flex;
    flex-wrap: wrap;
    transform: rotate(45deg);
}
.logo span{
    width: 17px;
    height: 17px;
    background-color: red;
    margin: 2px;
    animation: scale 3.5s linear infinite;
}

.logo span:nth-child(1){
    border-radius: 50% 50% 50% 50%;
    background-color: #E5FBB8;
    transform-origin: bottom right;
    animation-delay: .5s;
}
.logo span:nth-child(2){
    border-radius: 50% 50% 50% 50%;
    background-color: #F3C583;
    transform-origin: bottom left;
    animation-delay: 2.5s;
}
.logo span:nth-child(3){
    border-radius: 50% 50% 50% 50%;
    background-color: #B980F0;
    transform-origin: top right;
    animation-delay: .5s;
}
.logo span:nth-child(4){
    border-radius: 50% 50% 50% 50%;
    background-color: #FE9898;
    transform-origin: top left;
    animation-delay: 3s;
}
@keyframes scale{
    50%{
        transform: scale(1.1);
    }
}
</style>

<div class="d-flex flex-row">

    <div id="logo" class="logo">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    
    {{--
    <div class="ml-4">
        {{ config('app.name') }} 
    </div>    
    --}}

</div>