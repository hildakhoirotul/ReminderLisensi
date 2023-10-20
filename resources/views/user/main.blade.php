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
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell-fill"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end text-small">
                        <li><a class="dropdown-item" href="#">Notifikasi 1</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Notifikasi 2</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Notifikasi 3</a></li>
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->

</body>

</html>