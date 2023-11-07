<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/reminder.png') }}" rel="icon">
    <link href="{{ asset('img/reminder.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Datatables -->
    <!-- Template Main CSS File -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
    <!-- <i class="bi bi-list mobile-nav-toggle d-lg-none"></i> -->
    <!-- ======= Header ======= -->

    <!-- End Header -->
    <header class="p-2 mb-3 border-bottom header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-end justify-content-lg-end">
                <div class="icon" id="bell"><i class="bi bi-bell" style="color: #103363;font-size: 18px;"></i></div>
                @if(!empty($countNotif))
                <span class="badge" id="notificationBadge">{{ $countNotif }}</span>
                @endif
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
                        @if(!empty($countNotif))
                        <a class="dropdown-item text-center text-s" style="color: #91989f;" href="{{ route('notifikasi') }}">Lihat Selengkapnya ...</a>
                        @else
                        <a class="dropdown-item text-center text-s" style="color: #91989f;">Belum ada pesan ...</a>
                        @endif
                    </div>
                </div>
                <a type="button" class="btn btn-logout me-4" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="bi bi-door-open-fill me-1" style="font-size: 18px;"></i>
                    <span style="font-weight: 600;margin-left: 5px;">{{ __('KELUAR') }}</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </header>
    @include('sweetalert::alert')

    @include('admin.sidebar')

    @yield('content')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('bootstrap-5.3.2/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap-5.3.2/js/bootstrap.min.js') }}"></script>
    <!-- <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script> -->
    <script src="{{ asset('js/glightbox.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/typed.umd.js') }}"></script>
    <script src="{{ asset('js/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('js/validate.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        if (!('Notification' in window)) {
            alert('Web Notification is not supported');
        } else {
            Notification.requestPermission(permission => {
                if (permission === 'granted') {
                    window.Echo.channel('reminder').listen('.message', (e) => {
                        console.log('testing');
                        let notification = new Notification('License Reminder!', {
                            body: e.message + " akan segera berakhir masa waktunya.", // content for the alert
                            icon: "https://pusher.com/static_logos/320x320.png" // optional image url
                        });

                        notification.onclick = () => {
                            window.open(window.location.href);
                        };

                    });
                }
            });
        }
    </script>
    <script>
        document.getElementById('bell').addEventListener('click', function() {
            var notificationBadge = document.getElementById('notificationBadge');
            var notifications = document.getElementById('box');
            var notifikasiElements = notifications.querySelectorAll('[data-id]');

            console.log(notifikasiElements);
            notifikasiElements.forEach(function(element) {
                var notifikasiId = element.getAttribute('data-id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Tambahkan CSRF token
                    }
                });

                $.post('{{ route('markAsRead') }}', {
                        notifikasi_id: notifikasiId
                    },
                    function(data) {
                        console.log(data.message); // Output pesan dari server
                        element.setAttribute('data-read', 'true'); // Setel atribut data-read menjadi 'true' untuk menandai notifikasi sebagai dibaca
                    });
            });

            if (notifications.style.display === 'none' || notifications.style.display === '') {
                notifications.style.display = 'block';
            } else {
                notifications.style.display = 'none';
            }
        });
    </script>
</body>

</html>