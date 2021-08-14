<style>
  .bar{
    min-height:75px;
    background-color: #2e2e2e;
  }
  .web-title{
    font-size:25px;
  }
  .nav-item{
    font-size:14px;
    font-weight: 600;
    cursor:pointer;
  }
  .nav-item:hover{
    color:#cccccc!important;
  }
</style>

@php

  use App\Models\UniqueVisit;

  $visits = UniqueVisit::count();

@endphp

<div class="bar h-100 d-flex text-white">
  

  <!-- Blog title -->
  <a class="web-title mt-3 ml-5 mr-auto" href="/">
  
    @include('components/logo')

  </a>

  <!-- Nav items -->
  <div class="mt-4 mr-5">
    @include('components/dropdown_one')
  </div>  

  <div class="mt-4 mr-5">
    @include('components/dropdown_two')
  </div>

  @auth 
    <div class="mt-4 mr-5">
      @include('components/admin_dropdown')
    </div>
  @endauth

  <!-- Unique visitors -->
  <div class="mr-3" style="margin-top:20px;">
    @include('components/visits_counter')
  </div>


</div>


