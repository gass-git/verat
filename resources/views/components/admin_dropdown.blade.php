<div class="dropdown">

    <a class="nav-item" id="dropdown-two" style="color:white;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Admin Menu
    </a>

    <div class="dropdown-menu mt-1" style="font-size:14px" aria-labelledby="dropdown-two">
        <a class="dropdown-item" href="/post">Create post</a>
        <a class="dropdown-item" href="/dashboard">Dashboard</a>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
    </div>

</div>


<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>