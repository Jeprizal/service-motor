<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{Request::is('member') ? 'active' :''}}" aria-current="page" href="{{url('member')}}">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Item</span>
          </a>
        </h6>
        <li class="nav-item">
            <a class="nav-link {{Str::startsWith(request()->path(),'produk-member') ? 'active' :''}}" href="{{url('produk-member')}}">
              <span data-feather="list" class="align-text-bottom"></span>
              Produk
            </a>
          </li>

        </ul>
      </div>
    </nav>
