<header class="p-2 mb-3 border-bottom header">
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-end justify-content-lg-end">
            <div class="icon" id="bell"><i class="bi bi-bell-fill" style="color: #91989f;"></i></div>
            <span class="badge" id="notificationBadge">{{ $countNotif }}</span>
            <div class="notifications" id="box">
                <h2>Notifications - <span>{{ $countNotif }}</span></h2>
                <div class="notif">
                    @foreach($notif as $notifikasi)
                    <div class="notifications-item"> <img src="{{ asset('img/notif.png') }}" alt="img">
                        <div class="text">
                            <h4>Reminder!!!</h4>
                            <p data-id="{{ $notifikasi->id }}">Lisensi {{ $notifikasi->nama_dokumen}} akan berakhir</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="py-2">
                    <a class="dropdown-item text-center text-s" style="color: #91989f;" href="{{ route('notifikasi') }}">Lihat Selengkapnya ...</a>
                </div>
            </div>
            <a type="button" class="btn btn-danger me-4" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="bi bi-person-circle me-1" style="font-size: 16px;"></i>
                <span style="font-weight: 600;">{{ __('Logout') }}</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</header>