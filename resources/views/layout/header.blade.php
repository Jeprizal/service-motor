<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-warning fixed-top bg-warning">
        <div class="container-fluid">
            <img class="navbar-brand" src="../uploads/logo.png" width="50" height="50">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"
                            href="{{ url('') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" aria-current="page"
                            href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('produk') ? 'active' : '' }}"
                            href="{{ url('produk') }}">Layanan</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    @auth
                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <button class="btn btn-dark" type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/login">Login</a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
</header>
