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
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="js/purecounter_vanilla.js"></script>
    <script src="js/aos.js"></script>
    <script src="{{ asset('bootstrap-5.3.2/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap-5.3.2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="js/glightbox.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/typed.umd.js"></script>
    <script src="js/noframework.waypoints.js"></script>
    <script src="js/validate.js"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>


</body>

</html>