{{-- <div> --}}
<nav class="navbar navbar-expand-md bg-dark sticky-top border-bottom" data-bs-theme="dark">

    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('produk') ? 'active' : '' }}" href="/produk">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('status*') ? 'active' : '' }}" href="/status">Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kategori*') ? 'active' : '' }}" href="/kategori">kategori</a>
                </li>

            </ul>

            {{-- <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard"><i
                                        class=" bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right">
                                        </i>Logout</button>
                                </form> --}}
            {{-- <a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"> Logout</i></a> --}}
            {{-- </li>
                        </ul>
                    </li>
                @else --}}
            {{-- <li class="nav-tem {{ $active === 'login' ? 'active' : '' }}">
                        <a href="/login" class="nav-link">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login</a>
                    </li> --}}
            {{-- <li class="nav-tem">
                        <a href="/login" class="nav-link  {{ Request::is('login') ? 'active' : '' }}">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login</a>
                    </li>
                @endauth
            </ul> --}}
        </div>
    </div>
    {{-- </div> --}}
</nav>
</div>
