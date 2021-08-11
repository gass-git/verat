<style>
  .bar{
    min-height:70px;
  }
  .web-title{
    font-size:25px;
  }
  .nav-item{
    font-size:20px;
    cursor:pointer;
  }
  .nav-item:hover{
    color:#96BAFF!important;
  }
</style>

@php

  use App\Models\UniqueVisit;

  $visits = UniqueVisit::count();

@endphp

<div class="bar h-100 d-flex text-white">
  

  <!-- Blog title -->
  <a class="web-title mt-3 ml-2 mr-auto" href="/">Gass.codes</a>

  
  <!-- Nav items -->
  <div class="mt-3 mr-5">
    @include('components/dropdown_one')
  </div>  

  <div class="mt-3 mr-5">
    @include('components/dropdown_two')
  </div>

  @auth 
    <div class="mt-3 mr-5">
      @include('components/admin_dropdown')
    </div>
  @endauth

  <!-- Unique visitors -->
  <div class="mt-3 mr-3">
    @include('components/visits_counter')
  </div>


</div>


