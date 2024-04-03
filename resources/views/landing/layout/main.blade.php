<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="gllery.png">

  <title>Gllery</title>

  <!-- Bootstrap core CSS -->
  <link href="asset-landing/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Theme CSS -->
  <link href="asset-landing/css/style.css" rel="stylesheet">
  <link href="asset-landing/css/font-awesome.min.css" rel="stylesheet">
  <link href="asset-landing/css/font-circle-video.css" rel="stylesheet">

  <!-- font-family: 'Hind', sans-serif; -->
  <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700' rel='stylesheet' type='text/css'>

  <!-- Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="light">

  <!-- logo, menu, search, avatar -->
  <div class="container-fluid">
    <div class="row">
      <div class="btn-color-toggle">
        <img src="images/icon_bulb_light.png" alt="">
      </div>
      <div class="navbar-container">
        <div class="container">
          <div class="row">
            <div class="col-xs-3 visible-xs">
              <a href="#" class="btn-menu-toggle"><i class="cv cvicon-cv-menu"></i></a>
            </div>
            <div class="col-lg-1 col-sm-2 col-xs-6">
              <a class="navbar-brand" href="/gallery">
                <img src="gllery.png" alt="Project name" class="logo" />
                <span>Gllery</span>
              </a>
            </div>
            <div class="col-lg-2 col-sm-10 hidden-xs">
              <ul class="list-inline menu">
                <li class="color-active">
                  <a href="/gallery">Beranda</a>
                </li>
                <li><a href="/kategori">Kategori</a></li>
              </ul>
            </div>
            <div class="col-lg-7 col-sm-8 col-xs-3">
              <form action="https://azyrusthemes.com/circlevideo/search.html" method="post">
                <div class="topsearch">
                  <i class="cv cvicon-cv-cancel topsearch-close"></i>
                  <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search" aria-describedby="sizing-addon2">
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-2 col-sm-4 hidden-xs" style="align-items: center; display: flex; justify-content: end; padding-right: 40px;">
              @auth
              <!-- Tampilkan avatar pengguna dan dropdown menu -->
              <div class="avatar pull-left">
                <a href="/profil"> <img src="https://i.pinimg.com/564x/58/79/29/5879293da8bd698f308f19b15d3aba9a.jpg" alt="avatar" style="width: 40px; height: 40px; border-radius: 50px;" /></a>
              </div>
              <div class="selectuser pull-left">
                <div class="btn-group pull-right dropdown">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <g fill="none" fill-rule="evenodd">
                      <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                      <path fill="currentColor" d="M12.707 15.707a1 1 0 0 1-1.414 0L5.636 10.05A1 1 0 1 1 7.05 8.636l4.95 4.95l4.95-4.95a1 1 0 0 1 1.414 1.414z" />
                    </g>
                  </svg>
                  <ul class="dropdown-menu">
                    <li><a href="/profil">Profile</a></li>
                    <li>
                      <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="clearfix"></div>
              @else
              <!-- Tampilkan tombol Login -->
              <button class="btn login-btn"><a href="/login">Login</a></button>
              @endauth
            </div>


          </div>
          <div class="hidden-xs">
            <a href="upload.html">
              <div class="upload-button">
                <i class="cv cvicon-cv-upload-video"></i>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /logo -->

  <div class="mobile-menu">
    <div class="mobile-menu-head">
      <a href="#" class="mobile-menu-close"></a>
      <a class="navbar-brand" href="index.html">
        <img src="gllery.png" alt="Project name" class="logo" />
        <span>Gllery</span>
      </a>
      <div class="mobile-menu-btn-color">
        <img src="images/icon_bulb_light.png" alt="">
      </div>
    </div>
    <div class="mobile-menu-content">
      @auth
      <div class="mobile-menu-user" style="margin-top: 15px;">
        <a href="/profil">
          <p>{{ Auth::user()->username }}</p>
        </a>
        <span class="caret"></span>
      </div>
      @endauth
      <a href="#" class="btn mobile-menu-upload">
        <i class="cv cvicon-cv-upload-video"></i>
        <span>Upload Video</span>
      </a>
      <div class="mobile-menu-list">
        <ul>
          <li>
            <a href="/gallery">Beranda</a>
          </li>
          <hr>
          <li>
            <a href="/kategori">Kategori</a>
          </li>
          <hr>
        </ul>
      </div>
      @auth
      <a href="#" class="btn mobile-menu-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      @else
      <a href="/login" class="btn mobile-menu-logout">Login</a>
      @endauth
    </div>
  </div>

  @yield('content')


  <script src="asset-landing/js/jquery.min.js"></script>
  <script src="asset-landing/bootstrap/js/bootstrap.min.js"></script>
  <script src="asset-landing/js/custom.js"></script>
</body>

</html>