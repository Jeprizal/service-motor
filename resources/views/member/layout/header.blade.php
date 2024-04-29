<header class="navbar navbar-info sticky-top bg-info flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{url('home')}}">{{ Auth::user()->name }}</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
    <ul class="navbar-nav ms-auto mb-2 mb-md-0">

      <!-- <a class="nav-link px-3" href="#">Sign out</a> -->
          <li class="nav-item">
          <form action="/logout" method="post">
            @csrf
            <button class="btn btn-dark me-3" type="submit">Logout</button>
          </form>
</li>

</header>
