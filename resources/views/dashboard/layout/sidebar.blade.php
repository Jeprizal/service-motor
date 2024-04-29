<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                    href="{{ url('dashboard') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>MASTER</span>
                </a>
            </h6>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('payment.index') ? 'active' : '' }}" href="{{ url('payment') }}">
                    <span data-feather="archive" class="align-text-bottom"></span>
                    Payment
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('layanan') ? 'active' : '' }}" href="{{ url('layanan') }}">
                    <span data-feather="archive" class="align-text-bottom"></span>
                    Layanan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('user-dashboard') ? 'active' : '' }}"
                    href="{{ url('user-dashboard') }}">
                    <span data-feather="user" class="align-text-bottom"></span>
                    Pengguna
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('transaksi') ? 'active' : '' }}" href="{{ url('transaksi') }}">
                    <span data-feather="archive" class="align-text-bottom"></span>
                    Transaksi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('produk-dashboard') ? 'active' : '' }}"
                    href="{{ url('produk-dashboard') }}">
                    <span data-feather="archive" class="align-text-bottom"></span>
                    Produk
                </a>
            </li>
        </ul>
    </div>
</nav>
