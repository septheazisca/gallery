<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.png">

  <title>Gallery</title>

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
              <a class="navbar-brand" href="index.html">
                <img src="images/logo.svg" alt="Project name" class="logo" />
                <span>Circle</span>
              </a>
            </div>
            <div class="col-lg-3 col-sm-10 hidden-xs">
              <ul class="list-inline menu">
                <li class="color-active">
                  <a href="#">Pages</a>
                </li>
                <li><a href="categories.html">Categories</a></li>
                <li><a href="channel.html">Channels</a></li>
              </ul>
            </div>
            <div class="col-lg-6 col-sm-8 col-xs-3">
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
            <div class="col-lg-2 col-sm-4 hidden-xs">
              <div class="avatar pull-left">
                <img src="images/avatar.png" alt="avatar" />
                <span class="status"></span>
              </div>
              <div class="selectuser pull-left">
                <div class="btn-group pull-right dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Bailey
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="login.html">Login</a></li>
                    <li><a href="signup.html">Sign up</a></li>
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
        <img src="images/logo.svg" alt="Project name" class="logo" />
        <span>Circle</span>
      </a>
      <div class="mobile-menu-btn-color">
        <img src="images/icon_bulb_light.png" alt="">
      </div>
    </div>
    <div class="mobile-menu-content">
      <div class="mobile-menu-user">
        <div class="mobile-menu-user-img">
          <img src="images/ava11.png" alt="">
        </div>
        <p>Bailey Fry </p>
        <span class="caret"></span>
      </div>
      <a href="#" class="btn mobile-menu-upload">
        <i class="cv cvicon-cv-upload-video"></i>
        <span>Upload Video</span>
      </a>
      <div class="mobile-menu-list">
        <ul>
          <li>
            <a href="">Pages</a>
          </li>
          <hr>
          <li>
            <a href="">Categories</a>
          </li>
          <hr>
          <li>
            <a href="">Channels</a>
          </li>
          <hr>
        </ul>
      </div>
      <a href="#" class="btn mobile-menu-logout">Log out</a>
    </div>
  </div>

  @yield('content')


  <script src="asset-landing/js/jquery.min.js"></script>
  <script src="asset-landing/bootstrap/js/bootstrap.min.js"></script>
  <script src="asset-landing/js/custom.js"></script>
</body>

</html>