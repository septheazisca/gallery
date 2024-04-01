<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.png">

  <title>Gallery | Login</title>

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
            Log Into Your Circle Account
          </div>
          <div class="l-form">
            <form method="POST" action="{{ route('login') }}">
            @csrf
              <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username" placeholder="Masukan username anda">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="**********">
              </div>
              <div class="row">
                <div class="col-lg-7"><button type="submit" class="btn btn-cv1">Login</button></div>
                <div class="hidden-xs">
                  <div class="col-lg-1 ortext">or</div>
                  <div class="col-lg-4 signuptext"><a href="signup.html">Sign Up</a></div>
                </div>
              </div>
              <div class="row hidden-xs">
                <div class="col-lg-12 forgottext">
                  <a href="#">Forgot Username or Password?</a>
                </div>
              </div>
              <div class="row visible-xs">
                <div class="col-xs-6">
                  <div class="forgottext"><a href="#">Forgot Password?</a></div>
                </div>
                <div class="col-xs-6">
                  <div class="signuptext text-right"><a href="signup.html">Sign Up</a></div>
                </div>
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