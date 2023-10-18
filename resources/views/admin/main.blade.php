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
    <link href="css/aos.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="css/glightbox.min.css" rel="stylesheet">
    <link href="css/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="css/admin.css" rel="stylesheet">
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

    <!-- Vendor JS Files -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="js/purecounter_vanilla.js"></script>
    <script src="js/aos.js"></script>
    <script src="{{ asset('bootstrap-5.3.2/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap-5.3.2/js/bootstrap.min.js') }}"></script>
    <!-- <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script> -->
    <script src="js/glightbox.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/typed.umd.js"></script>
    <script src="js/noframework.waypoints.js"></script>
    <script src="js/validate.js"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
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

        // var deviceToken = '{{ $deviceToken }}';

        // var permissionRequested = localStorage.getItem('notificationPermissionRequested');

        // if (deviceToken === null || deviceToken === '') {
            // Device_token kosong dan izin belum pernah diminta
            // if (permissionRequested === null ) {
                // Tampilkan dialog konfirmasi
                // if (confirm('Izinkan notifikasi?')) {
                    // Pengguna mengizinkan, minta izin notifikasi
                    messaging.requestPermission()
                        .then(function() {
                            return messaging.getToken()
                                .then(function(token) {
                                    console.log(token);
                                    saveToken(token); // Simpan token ke server
                                    // Tandai bahwa izin sudah diminta
                                    // localStorage.setItem('notificationPermissionRequested', 'true');
                                });
                        })
                        .catch(function(err) {
                            console.log('User Chat Token Error' + err);
                        });
                // } else {
                    // Pengguna tidak mengizinkan
                    // console.log('Pengguna tidak mengizinkan notifikasi.');
                    // Tandai bahwa izin sudah diminta
                    // localStorage.setItem('notificationPermissionRequested', 'true');
                // }
            // }
        // }

        function saveToken(token) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{ route("save.token") }}',
                type: 'POST',
                data: {
                    token: token
                },
                dataType: 'JSON',
                success: function(response) {
                    // alert('Token saved successfully.');
                },
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

</body>

</html>