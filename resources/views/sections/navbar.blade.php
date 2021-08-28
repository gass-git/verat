<style>
  .bar{
    min-height:75px;
    min-width: 443px;
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
    @include('components/navbar/logo')
  </a>

  <!-- Nav items -->
   <div class="mt-4 mr-5">
    @include('components/navbar/dropdown_one')
  </div>  

  <div class="mt-4 mr-5">
    @include('components/navbar/dropdown_two')
  </div>

  {{-- <div class="mt-4 mr-5">
    <a href="{{ url('/show_bookmarks') }}" class="nav-item" style="color:white;">
      Bookmarked
    </a>
  </div> --}}

  @auth 
    <div class="mt-4 mr-5">
      @include('components/navbar/admin_dropdown')
    </div>
  @endauth

  <!-- Unique visitors -->
  <div id="visit-counter" class="mr-3" style="margin-top:20px;">
    @include('components/navbar/visits_counter')
  </div>

</div>


