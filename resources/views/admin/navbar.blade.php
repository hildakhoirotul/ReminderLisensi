<header class="p-2 mb-3 border-bottom header">
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-end justify-content-lg-end">
            <div class="dropdown text-end">
                <a href="#" class="d-block link-body-emphasis text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell-fill"></i>
                    <span class="badge">3</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-small">
                    @php $i=1 @endphp
                    @foreach($notif as $notifikasi)
                    <li>
                        <i class="bi bi-chat-quote"></i>
                        <a class="dropdown-item" href="#">Reminder lisensi {{ $notifikasi->nama_dokumen }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="dropdown text-end">
                <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                    <span class="ms-2" style="font-weight: 600;">{{ Auth::user()->nama }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-small">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="bi bi-door-open-fill"></i>
                            <span style="font-weight: 600;">{{ __('Logout') }}</span>

                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>