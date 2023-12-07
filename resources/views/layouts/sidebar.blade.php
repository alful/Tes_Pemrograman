<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}" href="/dashboard/posts">
                    <span data-feather="file-text"></span>
                    My Posts
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/barang*') ? 'active' : '' }}" href="/dashboard/barang">
                    <span data-feather="file-text"></span>
                    Barang
                </a>
            </li>
        </ul>

        {{-- //menggunakan Gate Authorization --}}
        {{-- @can('is_admin') --}}
        {{-- <h6 class="sidebar-heading d-flex justify-content-between align-item-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
            </h6> --}}

        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/suplier*') ? 'active' : '' }}" href="/dashboard/suplier">
                    <span data-feather="grid"></span>
                    Suplier
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/pembelian*') ? 'active' : '' }}"
                    href="/dashboard/pembelian">
                    <span data-feather="grid"></span>
                    Pembelian
                </a>
            </li>

        </ul>
        {{-- @endcan --}}
    </div>
</nav>
