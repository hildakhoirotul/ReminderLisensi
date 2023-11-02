<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    @include('admin.navbar')
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        let notificationCount = 0;
        if (!('Notification' in window)) {
            alert('Web Notification is not supported');
        } else {
            Notification.requestPermission(permission => {
                if (permission === 'granted') {
                    window.Echo.channel('reminder').listen('.message', (e) => {
                        console.log('testing');
                        notificationCount++;
                        let notification = new Notification('License Reminder!', {
                            body: e.message + " akan segera berakhir masa waktunya.", // content for the alert
                            icon: "https://pusher.com/static_logos/320x320.png" // optional image url
                        });

                        notification.onclick = () => {
                            window.open(window.location.href);
                        };

                        updateCount(notificationCount);
                    });
                    $('.dropdown-menu').on('show.bs.dropdown', function() {
                        // Set jumlah notifikasi ke nol saat dropdown dibuka
                        notificationCount = 0;
                        updateCount(notificationCount);
                    });

                    // Event saat dropdown notifikasi ditutup
                    $('.dropdown-menu').on('hidden.bs.dropdown', function() {
                        // Kembalikan jumlah notifikasi dengan jumlah yang belum dibaca
                        updateCount(notificationCount);
                    });
                }
            });
        }

        function updateCount(count) {
            if (count > 0) {
                $('.badge').text(count); // Tampilkan jumlah notifikasi di ikon
            }
        }
    </script>
    <script>
        document.getElementById('notifikasi-dropdown').addEventListener('shown.bs.dropdown', function() {
            // Saat dropdown dibuka, cari elemen dengan atribut data-notif-id
            var notifikasiElements = this.querySelectorAll('[data-notif-id]');

            notifikasiElements.forEach(function(element) {
                var notifikasiId = element.getAttribute('data-notif-id');

                // Kirim notifikasiId ke server melalui AJAX
                $.post('{{ route('mark-as-read') }}', {
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