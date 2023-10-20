<header id="header" class="d-flex flex-column justify-content-center">
    <nav id="navbar" class="navbar nav-menu">
        <ul>
            <li><a href="{{ route('dashboard') }}" data-link="/dashboard" class="nav-link scrollto active"><i class="bi bi-table"></i><span>Database</span></a></li>
            <li><a href="{{ route('userpage') }}" data-link="/account-list" class="nav-link scrollto"><i class="bi bi-person-add"></i><span>Tambah Pengguna</span></a></li>
            <li><a href="{{ route('notifikasi') }}" data-link="/notifications" class="nav-link scrollto"><i class="bi bi-bell"></i><span>Notifikasi</span></a></li>
        </ul>
    </nav>
</header>