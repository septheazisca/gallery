<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="asset-dashboard/img/favicon.png" rel="icon">
  <link href="asset-dashboard/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="asset-dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="asset-dashboard/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="asset-dashboard/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="asset-dashboard/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="asset-dashboard/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="asset-dashboard/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="asset-dashboard/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="asset-dashboard/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="asset-dashboard/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="asset-dashboard/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/dashboard-profil">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>


          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  @yield('sidebar')

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="asset-dashboard/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="asset-dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="asset-dashboard/vendor/chart.js/chart.umd.js"></script>
  <script src="asset-dashboard/vendor/echarts/echarts.min.js"></script>
  <script src="asset-dashboard/vendor/quill/quill.min.js"></script>
  <script src="asset-dashboard/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="asset-dashboard/vendor/tinymce/tinymce.min.js"></script>
  <script src="asset-dashboard/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="asset-dashboard/js/main.js"></script>

</body>

</html>