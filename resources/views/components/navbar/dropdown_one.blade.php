<div class="dropdown">
  
  <a class="nav-item" id="dropdown-one" style="color:#ffffff" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Sort By
  </a>

  <div class="dropdown-menu mt-2 shadow-sm" style="font-size:14px" aria-labelledby="dropdown-one">
    <a class="dropdown-item" href="{{ url('/home_sortby=latest') }}">Latest</a>
    <a class="dropdown-item" href="{{ url('/home_sortby=views') }}">Views</a>
    <a class="dropdown-item" href="{{ url('/home_sortby=likes') }}">Likes</a>
    <a class="dropdown-item" href="{{ url('/home_sortby=comments') }}">Comments</a>
  </div>

</div>