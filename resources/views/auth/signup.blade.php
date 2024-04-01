<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.png">

  <title>Circle Video | Signup</title>

  <!-- Bootstrap core CSS -->
  <link href="asset-landing/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Theme CSS -->
  <link href="asset-landing/css/style.css" rel="stylesheet">
  <link href="asset-landing/css/font-awesome.min.css" rel="stylesheet">
  <link href="asset-landing/css/font-circle-video.css" rel="stylesheet">

  <!-- font-family: 'Hind', sans-serif; -->
  <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700' rel='stylesheet' type='text/css'>
</head>

<body class="light">

  <div class="container-fluid bg-image">
    <div class="row">
      <div class="login-wraper">
        <div class="hidden-xs">
          <img src="images/login.jpg" alt="">
        </div>
        <div class="banner-text hidden-xs">
          <div class="line"></div>
          <div class="b-text">
            Watch <span class="color-active">millions<br> of</span> <span class="color-b1">v</span><span class="color-b2">i</span><span class="color-b3">de</span><span class="color-active">os</span> for free.
          </div>
          <div class="overtext">
            Over 6000 videos uploaded Daily.
          </div>
        </div>
        <div class="login-window">
          <div class="l-head">
            Sign Up for Free
          </div>
          <div class="l-form">
            <form method="POST" action="{{ route('register') }}">
            @csrf
              <div class="" style="display: flex; gap: 10px;">
                <div class="form-group">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input class="form-control"  type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Masukan nama lengkap anda">
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input class="form-control" type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Masukan username anda">
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="sample@gmail.com">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="**********">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" cols="30" rows="3">{{ old('alamat') }}</textarea>
              </div>
              <div class="row">
                <div class="col-lg-7"><button type="submit" class="btn btn-cv1">Sign Up</button></div>
                <div class="hidden-xs">
                  <div class="col-lg-1 ortext">or</div>
                  <div class="col-lg-4 signuptext"><a href="login.html">Log In</a></div>
                </div>
              </div>
              <div class="visible-xs text-center mt-30">
                <span class="forgottext"><a href="#">Already have an account?</a></span>
                <span class="signuptext"><a href="#">Login here</a></span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="asset-landing/js/jquery.min.js"></script>
  <script src="asset-landing/bootstrap/js/bootstrap.min.js"></script>
  <script src="asset-landing/js/custom.js"></script>

</body>

</html>