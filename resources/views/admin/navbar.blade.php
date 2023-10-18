<header class="p-2 mb-3 border-bottom header">
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-end justify-content-lg-end">
            <div id="notifikasi-dropdown" class="dropdown text-end">
                <a href="#" class="d-block link-body-emphasis text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell-fill"></i>
                    @if(!empty($countNotif))
                    <span class="badge">{{ $countNotif }}</span>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end notifikasi text-small py-0">
                    @php $i=1 @endphp
                    @if(!empty($countNotif))
                    @foreach($notif as $notifikasi)
                    <li>
                        <div class="dropdown-item d-flex align-items-center" data-notif-id="{{ $notifikasi->id }}"><i class="bi bi-chat-quote"></i><span style="font-weight: 800;">Reminder,</span>&nbsp;lisensi {{ $notifikasi->nama_dokumen }}</div>
                    </li>
                    @endforeach
                    <li>
                        <a class="dropdown-item text-center" href="{{ route('notifikasi') }}">Lihat Selengkapnya</a>
                    </li>
                    @else
                    <li><div class="dropdown-item">Belum ada pesan saat ini ...</div></li>
                    @endif
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