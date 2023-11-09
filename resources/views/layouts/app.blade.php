<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - ProprioAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <link href= "{{ asset('/img/favicon.png') }}"  rel="icon">
  <link href="{{ asset('/img/apple-touch-icon.png') }}"  rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/css/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('vehicle.index') }}" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">TRACK_CAR</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

<!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->



        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">   </span>
          </a><!-- End Profile Iamge Icon -->


        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('vehicle.index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('driver.index') }}">
          <i class="bi bi-card-list"></i>
          <span>Drivers</span>
        </a>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('vehicle.attribution') }}">
          <i class="bi bi-card-list"></i>
          <span>Attribution</span>
        </a>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/map">
          <i class="bi bi-card-list"></i>
          <span>Track Vehicle</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('vehicle.fuel') }}">
          <i class="bi bi-card-list"></i>
          <span>Fuel</span>
        </a>
      </li><!-- End Tables Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('vehicle.maintenance') }}">
          <i class="bi bi-card-list"></i>
          <span>Vehicule Maintenance</span>
        </a>
      </li><!-- End Tables Nav -->




    </ul>

  </aside><!-- End Sidebar-->
  @yield('main')
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>ProprioAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
     Designed by M2Sigl
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('/css/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('/css/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/css/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('/css/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('/css/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('/css/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('/css/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('/css/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/js/main.js') }}"></script>

</body>

</html>
