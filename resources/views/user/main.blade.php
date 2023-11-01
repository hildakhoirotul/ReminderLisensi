<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon"> -->
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper-bundle.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
    <!-- <i class="bi bi-list mobile-nav-toggle d-lg-none"></i> -->
    <!-- ======= Header ======= -->
    <header class="p-1 mb-3 border-bottom header">
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
                            <a class="dropdown-item text-center" href="{{ route('notif') }}">Lihat Selengkapnya</a>
                        </li>
                        @else
                        <li>
                            <div class="dropdown-item">Belum ada pesan saat ini ...</div>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="dropdown text-end">
                    <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                        <span class="ms-2">{{ Auth::user()->nama }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end text-small">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="bi bi-door-open-fill"></i>
                                <span>{{ __('Logout') }}</span>

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
    <header id="header" class="d-flex flex-column justify-content-center">
        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="{{ route('home') }}" data-link="/home" class="nav-link scrollto active"><i class="bi bi-table"></i><span>Database</span></a></li>
                <li><a href="{{ route('notif') }}" data-link="/notification" class="nav-link scrollto"><i class="bi bi-bell"></i><span>Notifikasi</span></a></li>
            </ul>
        </nav>
        <!-- .nav-menu -->

    </header><!-- End Header -->

    @include('sweetalert::alert')

    @yield('content')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('bootstrap-5.3.2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/glightbox.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/typed.umd.js') }}"></script>
    <script src="{{ asset('js/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('js/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
    <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyCBdAE9wpP_a-SZXQFVECwG5mG8tjzkj3A",
            authDomain: "reminder-9c0db.firebaseapp.com",
            databaseURL: "https://reminder-9c0db-default-rtdb.firebaseio.com",
            projectId: "reminder-9c0db",
            storageBucket: "reminder-9c0db.appspot.com",
            messagingSenderId: "963226137382",
            appId: "1:963226137382:web:5db0be89b7c0f84f3547e7",
            measurementId: "G-6QDMHQ9WS7"
        };

        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();
        messaging.getToken()
            .then(function(currentToken) {
                if (currentToken) {
                    // Token saat ini ada, simpan ke server jika diperlukan
                    saveToken(currentToken);
                } else {
                    // Token saat ini belum ada, minta token baru
                    messaging.onTokenRefresh(function() {
                        messaging.getToken()
                            .then(function(newToken) {
                                console.log("Token yang diperbarui:", newToken);
                                saveToken(newToken);
                            })
                            .catch(function(err) {
                                console.log("Gagal mendapatkan token yang diperbarui:", err);
                            });
                    });
                }
            })
            .catch(function(err) {
                console.log('User Chat Token Error: ' + err);
            });

        function saveToken(token) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{ route("user.save.token") }}',
                type: 'POST',
                data: {
                    token: token
                },
                dataType: 'JSON',
                success: function(response) {},
                error: function(err) {
                    console.log('User Chat Token Error' + err);
                },
            });
        }

        messaging.onMessage(function(payload) {
            const noteTitle = payload.notification.title;
            const noteOptions = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(noteTitle, noteOptions);
        });
    </script>
    <script>
        document.getElementById('notifikasi-dropdown').addEventListener('shown.bs.dropdown', function() {
            // Saat dropdown dibuka, cari elemen dengan atribut data-notif-id
            var notifikasiElements = this.querySelectorAll('[data-notif-id]');

            notifikasiElements.forEach(function(element) {
                var notifikasiId = element.getAttribute('data-notif-id');

                // Kirim notifikasiId ke server melalui AJAX
                $.post('{{ route('markAs - read') }}', {
                        notifikasi_id: notifikasiId
                    },
                    function(data) {
                        console.log(data.message); // Output pesan dari server
                    });
            });
        });
    </script>
</body>

</html>