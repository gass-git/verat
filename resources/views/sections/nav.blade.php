<style>
  .bar{
    background-color:#0a2a42;
  }
  .web-title{
    font-size:25px;
  }
  .nav-item{
    font-size:20px;
    cursor:pointer;
  }
  .drop-down{
    background-color: white; 
    border-radius:10px;
    width:150px; 
    position:absolute; 
    top:75px; 
    z-index:2;
    display:none;
  }
</style>

<div class="bar h-100 d-flex p-3 text-white">
  
  <!-- Blog title -->
  <a class="web-title ml-2 mr-auto" href="/">Gass.codes</a>

  <!-- Nav options -->
  <div id="sort-by" class="nav-item mr-5 mt-1" style="float:right">Sort by</div>
  <div id="topics" class="nav-item mr-5 mt-1">Topics</div>

  <!-- Unique visitors -->
  <div class="mr-3">
    @include('components/visits_counter')
  </div>

</div>

@include('components/drop_down_one')
@include('components/drop_down_two')