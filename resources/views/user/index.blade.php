<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GLERRY</title>
  <link rel="icon" href="gllery.png">

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- SWEETALERT2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- ICON -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

  <link rel="stylesheet" href="asset-user/css/style.css">

  <link rel="stylesheet" href="assets/extensions/filepond/filepond.css">
  <link rel="stylesheet" href="assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css">
  <link rel="stylesheet" href="assets/extensions/toastify-js/src/toastify.css">

</head>

<body>

  <!----------------------------- NAVBAR -------------------------->
  <nav class="navbar navbar-expand-lg py-4" style="box-shadow: rgba(99, 99, 99, 0.08) 0px 2px 8px 0px;">
    <div class="container">
      <a class="navbar-brand" href="/gallery">
        <img src="gllery.png" alt="Project name" class="logo" width="30px" />
        <span>Gllery</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Kategori</a>
          </li>
        </ul>
        <form class="d-flex me-2" role="search" style="flex-grow: 1;">
          <input class="form-control me-2 bg-body-tertiary border-0" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-gllery" type="submit">Search</button>
        </form>
        @if(Auth::check())
        <!-- Pengguna sudah login -->
        <div class="dropdown">
          <button class="mt-2 mt-lg-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="border: none; background-color: transparent;">
            <img src="https://i.pinimg.com/564x/25/2e/5d/252e5d6ae3a59c5e00b7733b416f1e50.jpg" style="width: 40px; height: 40px; border-radius: 50%;" class="me-2" alt="Avatar">
            <i class="bi bi-chevron-down"></i>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#">Profil</a></li>
            <li>
              <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </div>
        @else
        <!-- Pengguna belum login -->
        <button class="btn btn-success-gllery mt-2 mt-lg-0 col-12 col-lg-auto" type="submit" data-bs-toggle="modal" data-bs-target="#loginRegisterModal">Login</button>
        @endif

      </div>
    </div>
  </nav>
  <!----------------------------- NAVBAR END -------------------------->



  <!----------------------------- FAB ADD -------------------------->
  <div class="fab-container" style="position: absolute; left: 90%; top: 10%;">
    <!-- Floating Action Button -->
    <div class="dropdown d-inline">
      <button class="btn rounded-circle shadow-lg p-3 btn-fab" style="background-color: #00044B; color: white;" type="button" id="fabDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-images fs-4"></i>
      </button>
      <ul class="dropdown-menu" aria-labelledby="fabDropdown">
        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addFoto">Unggah Foto</a></li>
        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addAlbum">Buat Album</a></li>
      </ul>
    </div>
  </div>
  <!----------------------------- FAB ADD END -------------------------->



  <!----------------------------- KATEGORI -------------------------->
  <div class="container py-5 border-bottom">
    <div class="category-section">
      <p class="fs-5 fw-medium">Kategori</p>
      @foreach ($kategoris as $kategori)
      <button class="btn btn-kategori py-2 px-4 mb-2 me-1">{{ $kategori->judul_kategori }}</button>
      @endforeach
    </div>
  </div>
  <!----------------------------- KATEGORI END -------------------------->



  <!----------------------------- UNGGAHAN -------------------------->
  <div class="container py-5">
    <div class="category-section">
      <p class="fs-5 fw-medium">Unggahan Terbaru</p>
      <div class="content-container m-0">
        <div class="box-content" data-bs-toggle="modal" data-bs-target="#showFoto">
          <img src="https://i.pinimg.com/564x/7a/db/19/7adb19dff307adf3ba361c1425c0190a.jpg" alt="">
          <div class="content-hover">
            <div class="profil me-2">
              <img src="https://i.pinimg.com/564x/b9/fc/2e/b9fc2ec6934f3e89ee33a6aa7efb4e4a.jpg" alt="" style="width: 40px; height: 40px; border-radius: 50%;">
            </div>
            <div class="text-content">
              <h3 class="image-title">asasaa</h3>
              <p class="image-date">Unggahan oleh: </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!----------------------------- UNGGAHAN END -------------------------->










  <!------------------------------------------------------- MODAL ---------------------------------------------------->

  <!----------------------------- MODAL SHOW FOTO -------------------------->
  <div class="modal fade" id="showFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close"></button>

        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6">
                <img src="https://i.pinimg.com/564x/7a/db/19/7adb19dff307adf3ba361c1425c0190a.jpg" alt="" style="width: 100%;">
              </div>
              <div class="col-lg-6">
                <div class="p-3">
                  <div class="container-head pb-3 d-flex align-items-center justify-content-between border-bottom border-light-subtle">
                    <div class="user-section d-flex align-items-center">
                      <img src="https://i.pinimg.com/564x/76/fe/07/76fe079c5c818d73dc0b7bf94df8b8bd.jpg" alt="" style="width: 40px; height: 40px; border-radius: 50%;">
                      <p class="fs-6 fw-medium ms-2 mb-0">Username</p>
                    </div>
                    <div class="more-action d-flex align-items-center">
                      <i class="fa-solid fa-ellipsis-vertical" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"></i>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Report</a></li>
                      </ul>
                    </div>

                  </div>
                  <div class="container-detail py-3" style="height: 295px; overflow-y: auto;">
                    <h4>Lorem, ipsum.</h4>
                    <p class="fs-6">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo omnis saepe reiciendis quas, temporibus ducimus!</p>
                    <div class="commentar-section mt-1">
                      <div class="commentars d-flex">
                        <div class="profile-user">
                          <img src="https://i.pinimg.com/564x/4c/a9/61/4ca9611d71516a62db77c1bb2f39864e.jpg" alt="" style="width: 35px; height: 35px; border-radius: 50%;">
                        </div>
                        <div class="detail-commentars">
                          <div class="username-date d-flex align-items-center justify-content-between">
                            <div class="username">
                              <h5 class="image-date ps-2 mb-1" style="font-size: 16px;">username</h5>
                            </div>
                            <div class="date">
                              <h5 class="mb-1" style="font-size: 12px;">10m</h5>
                            </div>
                          </div>
                          <p class="ps-2" style="font-size: 15px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iste?</p>
                        </div>
                      </div>

                      <div class="commentars d-flex">
                        <div class="profile-user">
                          <img src="https://i.pinimg.com/564x/4c/a9/61/4ca9611d71516a62db77c1bb2f39864e.jpg" alt="" style="width: 35px; height: 35px; border-radius: 50%;">
                        </div>
                        <div class="detail-commentars">
                          <div class="username-date d-flex align-items-center justify-content-between">
                            <div class="username">
                              <h5 class="image-date ps-2 mb-1" style="font-size: 16px;">username</h5>
                            </div>
                            <div class="date">
                              <h5 class="mb-1" style="font-size: 12px;">10m</h5>
                            </div>
                          </div>
                          <p class="ps-2" style="font-size: 15px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iste?</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="container-action pt-3 border-top border-light-subtle">
                    <div class="icons-action d-flex align-items-center justify-content-between">
                      <div class="heart-btn">
                        <div class="content">
                          <span class="heart"></span>
                          <span class="text">Like</span>
                          <span class="numb"></span>
                        </div>
                      </div>
                      <a class="m-0" style="font-size: 15px;"><u>Download</u></a>

                      <script>
                        $(document).ready(function() {
                          $('.content').click(function() {
                            $('.content').toggleClass("heart-active")
                            $('.text').toggleClass("heart-active")
                            $('.numb').toggleClass("heart-active")
                            $('.heart').toggleClass("heart-active")
                          });
                        });
                      </script>
                    </div>
                    <div class="comment d-flex mt-2">
                      <textarea class="rounded-start border-light-subtle" name="" id="" cols="30" rows="2" style="width: 100%;"></textarea>
                      <button class="rounded-end border-0" type="submit" style="background-color: #00044B; color: #fff;"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>
  <!----------------------------- MODAL SHOW FOTO END -------------------------->



  <!----------------------------- MODAL BUAT ALBUM -------------------------->
  <div class="modal fade" id="addAlbum" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <img src="gllery.png" alt="" style="width: 40px;">
          <h1 class="modal-title fs-5 ms-2" id="staticBackdropLabel">Gllery - Buat Album</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Silakan buat album baru dengan memberikan judul dan deskripsi.</p>
          <div class="mb-3">
            <label for="nama_album" class="form-label">Nama Album</label>
            <input type="text" class="form-control" id="nama_album">
          </div>
          <div class="mb-4">
            <label for="deskripsi" class="form-label">Alamat</label>
            <textarea class="rounded border-light-subtle form-control" name="deskripsi" id="deskripsi" cols="30" rows="2" style="width: 100%;"></textarea>
          </div>
          <button class="btn btn-gllery" style="width: 100%;" type="submit">Buat</button>

        </div>
      </div>

    </div>
  </div>
  <!----------------------------- MODAL BUAT ALBUM END -------------------------->



  <!----------------------------- MODAL UNGGAH FOTO -------------------------->
  <div class="modal fade" id="addFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form action="">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <img src="gllery.png" alt="" style="width: 40px;">
            <h1 class="modal-title fs-5 ms-2" id="staticBackdropLabel">Gllery - Unggah Foto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Tambahkan sentuhan Anda dengan mengunggah foto favorit Anda ke Gllery!</p>
            <div class="mb-3">
              <label for="lokasi_foto" class="form-label">Foto</label>
              <input type="file" name="lokasi_foto" class="image-preview-filepond">
            </div>
            <div class="mb-3">
              <label for="judul" class="form-label">Judul</label>
              <input type="text" class="form-control" id="judul">
            </div>
            <div class="mb-3">
              <label for="deskripsi_foto" class="form-label">Deskripsi</label>
              <textarea class="rounded border-light-subtle form-control" name="deskripsi _foto" id="deskripsi_foto" cols="30" rows="2" style="width: 100%;"></textarea>
            </div>
            <div class="mb-3">
              <label for="kategori" class="form-label">Kategori</label>
              <select class="form-select" aria-label="Default select example">
                <option selected>Pilih kategori</option>
              </select>
            </div>
            <div class="form-group icon-input mb-3">
              <button type="button" class="btn btn-gray200" id="pilihAlbum" style="background-color: #F1F1F1; width: 49.4%">
                <span class="bi bi-journal-album"></span> Pilih album
              </button>
              <button type="button" class="btn btn-gray200" id="buatAlbum" style="background-color: #F1F1F1; width: 49.4%">
                <span class="bi bi-journal-album"></span> Buat album
              </button>
            </div>
            <div id="albumSection" class="form-group icon-input" style="display: none;">
              <div class="mb-4">
                <label for="album" class="form-label">Pilih album</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Pilih album</option>
                </select>
              </div>
            </div>
            <div id="newAlbumSection" class="form-group icon-input" style="display: none;">
              <div class="mb-4">
                <label for="buat_album" class="form-label">Buat Album</label>
                <input type="text" class="form-control" id="buat_album">
              </div>
            </div>

            <script>
              document.getElementById("pilihAlbum").addEventListener("click", function() {
                document.getElementById("albumSection").style.display = "block";
                document.getElementById("newAlbumSection").style.display = "none";
                document.getElementsByName("new_album")[0].value = "";
              });

              document.getElementById("buatAlbum").addEventListener("click", function() {
                document.getElementById("albumSection").style.display = "none";
                document.getElementById("newAlbumSection").style.display = "block";
                document.querySelector("select[name='album']").selectedIndex = 0;
              });
            </script>
            <button class="btn btn-gllery" style="width: 100%;" type="submit">Unggah</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!----------------------------- MODAL UNGGAH FOTO END -------------------------->



  <!----------------------------- MODAL LOGIN REGISTER -------------------------->
  <div class="modal fade" id="loginRegisterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="modalLogin" id="modalLogin">
            <div class="modal-header">
              <img src="gllery.png" alt="" style="width: 40px;">
              <h1 class="modal-title fs-5 ms-2" id="staticBackdropLabel">Gllery - Login</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Silahkan masukkan username dan kata sandi anda untuk menjelajahi Gllery.</p>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="" name="username">
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="password" name="password">
                  <button class="btn btn-outline-secondary-gllery rounded-end" type="button" id="togglePassword">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
              <button class="btn btn-gllery mb-4" style="width: 100%;" type="submit">Login</button>
              <div class="link-register">
                <p class="text-center">Belum memiliki akun? <span><a href="#" id="showRegister">Buat akun di sini.</a></span></p>
              </div>
            </div>
          </div>
        </form>

        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="modalRegister" id="modalRegister" style="display: none;">
            <div class="modal-header">
              <img src="gllery.png" alt="" style="width: 40px;">
              <h1 class="modal-title fs-5 ms-2" id="staticBackdropLabel">Gllery - Register</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Untuk mendaftar, harap isi formulir dengan informasi yang diperlukan.</p>
              <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="rounded border-light-subtle form-control" name="alamat" id="alamat" cols="30" rows="2" style="width: 100%;"></textarea>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="mb-3">
                <label for="register_password" class="form-label">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="register_password" name="password" autocomplete="current-password">
                  <button class="btn btn-outline-secondary-gllery rounded-end" type="button" id="registerTogglePassword">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </div>
              </div>
              <button class="btn btn-gllery mb-4" style="width: 100%;" type="submit">Register</button>
              <div class="link-register">
                <p class="text-center">Sudah memiliki akun? <span><a href="#" id="showLogin">Login di sini.</a></span></p>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
  <!----------------------------- MODAL LOGIN REGISTER END -------------------------->

  <!------------------------------------------------------- MODAL END ---------------------------------------------------->


  <script>
    // Script untuk form login
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function() {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.querySelector('i').classList.toggle('fa-eye');
      this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    // Script untuk form register
    const registerTogglePassword = document.querySelector('#registerTogglePassword');
    const registerPassword = document.querySelector('#register_password');

    registerTogglePassword.addEventListener('click', function() {
      const type = registerPassword.getAttribute('type') === 'password' ? 'text' : 'password';
      registerPassword.setAttribute('type', type);
      this.querySelector('i').classList.toggle('fa-eye');
      this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    // show login register
    document.getElementById("showRegister").addEventListener("click", function() {
      document.getElementById("modalRegister").style.display = "block";
      document.getElementById("modalLogin").style.display = "none";
    });

    document.getElementById("showLogin").addEventListener("click", function() {
      document.getElementById("modalLogin").style.display = "block";
      document.getElementById("modalRegister").style.display = "none";
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
  <script src="assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js"></script>
  <script src="assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js"></script>
  <script src="assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js"></script>
  <script src="assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js"></script>
  <script src="assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
  <script src="assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js"></script>
  <script src="assets/extensions/filepond/filepond.js"></script>
  <script src="assets/extensions/toastify-js/src/toastify.js"></script>
  <script src="assets/static/js/pages/filepond.js"></script>
</body>

</html>