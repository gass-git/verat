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
</style>


<div class="bar h-100 d-flex p-3 text-white">
  

  <!-- Blog title -->
  <a class="web-title ml-2 mr-auto" href="/">Gass.codes</a>

  
  <!-- Nav items -->
  <div class="mr-5">
    @include('components/dropdown_one')
  </div>  

  <div class="mr-5">
    @include('components/dropdown_two')
  </div>

  @auth 
    <div class="mr-5">
      @include('components/admin_dropdown')
    </div>
  @endauth

  <!-- Unique visitors -->
  <div class="mr-3">
    @include('components/visits_counter')
  </div>


</div>


