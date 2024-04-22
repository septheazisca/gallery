<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GLERRY</title>
  <link rel="icon" href="{{ asset('gllery.png') }}">

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

  <link rel="stylesheet" href="{{ asset('asset-user/css/style.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


</head>

<body>

  <!----------------------------- NAVBAR -------------------------->
  <nav class="navbar navbar-expand-lg py-4" style="box-shadow: rgba(99, 99, 99, 0.08) 0px 2px 8px 0px;">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{ asset('gllery.png') }}" alt="Project name" class="logo" width="30px" />
        <span>Gllery</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/kategori">Kategori</a>
          </li>
        </ul>
        <form action="{{ route('search') }}" method="GET" class="d-flex me-2" role="search" style="flex-grow: 1;">
          <input class="form-control me-2 bg-body-tertiary border-0" type="search" placeholder="Search" aria-label="Search" name="query">
          <button class="btn btn-outline-gllery" type="submit">Search</button>
        </form>
        @if(Auth::check())
        <!-- Pengguna sudah login -->
        <div class="dropdown">
          <button class="mt-2 mt-lg-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="border: none; background-color: transparent;">
            @if(Auth::check() && Auth::user()->profile_image)
            <img src="{{ Storage::url(Auth::user()->profile_image) }}" style="width: 40px; height: 40px; border-radius: 50%;" class="me-2" alt="Avatar">
            @endif
            <i class="bi bi-chevron-down"></i>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li class="border-bottom py-1"><a class="dropdown-item" href="/profil/{{ Auth::user()->user_id }}">Profil</a></li>
            <li class="border-bottom py-2"><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#editProfil">Edit Profil</a></li>
            <li class="py-1">
              <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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


  <a href="{{ url()->previous() }}" class="btn btn-secondary py-3 px-4" style="background-color: #fff; color: #00044B; position: fixed; top: 6%; left: 3%; border-radius: 40px; border: none; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; z-index: 1000;"><i class="fa-solid fa-angle-left"></i></a>


  <!----------------------------- FAB ADD -------------------------->
  @if(Auth::check())
  <div class="fab-container">
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
  @endif

  <!----------------------------- FAB ADD END -------------------------->


  @yield('content')


  <!------------------------------------------------------- MODAL ---------------------------------------------------->

  <!----------------------------- MODAL SHOW FOTO -------------------------->
  @foreach ($fotos as $foto)
  <div class="modal fade" id="showFoto{{ $foto->foto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6">
                <img src="{{ $foto->lokasi_foto }}" alt="{{ $foto->judul_foto }}" style="width: 100%;">
              </div>
              <div class="col-lg-6">
                <div class="p-3">
                  <div class="container-head pb-3 d-flex align-items-center justify-content-between border-bottom border-light-subtle">
                    <div class="user-section d-flex align-items-center">
                      @if ($foto->user)
                      <img src=" {{ asset('storage/' . $foto->user->profile_image) }}" alt="Profil Pengguna" style="width: 40px; height: 40px; border-radius: 50%;">
                      <p class="fs-6 fw-medium ms-2 mb-0"><a href="/profil/{{ $foto->user->user_id }}" class="text-decoration-none text-dark">{{ $foto->user->username }}</a></p>
                      @endif
                    </div>
                    <div class="more-action d-flex align-items-center">
                      <i class="fa-solid fa-ellipsis-vertical" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"></i>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @if($foto->user->user_id == auth()->id()) <!-- Jika pengguna sedang melihat unggahan mereka sendiri -->
                        <li><a class="dropdown-item text-danger" href="{{ route('hapusFoto', ['id' => $foto->foto_id]) }}">Hapus</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editFoto{{ $foto->foto_id }}">Edit</a></li>
                        @else
                        <li><a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#reportUngghan">Report</a></li>
                        @endif
                      </ul>
                    </div>

                  </div>
                  <div class="container-detail py-3" style="height: 295px; overflow-y: auto;">
                    <h4>{{ $foto->judul_foto }}</h4>
                    <p class="fs-6">{{ $foto->deskripsi_foto }}
                      <span class="ms-2" style="font-size: 12px;">
                        @if(\Carbon\Carbon::parse($foto->created_at)->diffInDays() > 7)
                        {{ \Carbon\Carbon::parse($foto->created_at)->locale('id')->isoFormat('D MMMM YYYY') }}
                        @else
                        {{ \Carbon\Carbon::parse($foto->created_at)->locale('id')->diffForHumans() }}
                        @endif
                      </span>

                    </p>
                    <div class="commentar-section mt-1" id="commentList_{{ $foto->foto_id }}">
                    </div>
                  </div>
                  <div class="container-action pt-3 border-top border-light-subtle">
                    <div class="icons-action d-flex align-items-center justify-content-between">
                      <button type="button" class="btn btn-like btn-gray200 d-flex align-items-center" style="background-color: none; color: #00044B;" id="likeButton_{{ $foto->foto_id }}" data-photoid="{{ $foto->foto_id }}">
                        <i class="fa-regular fa-heart me-1" style="font-size: 25px;"></i>
                        <span id="likeCount_{{ $foto->foto_id }}">{{ $foto->likes_count }} like</span>
                      </button>
                      <a href="{{ $foto->lokasi_foto }}" download class="m-0" style="font-size: 15px;"><u style="cursor: pointer;"><i class="fa-solid fa-download" style="font-size: 20px; color: #00044B;"></i></u></a>
                    </div>
                    <form action="{{ route('comments.photo') }}" method="POST" class="commentForm">
                      @csrf
                      <div class="comment d-flex mt-2">
                        <textarea class="rounded-start border-light-subtle" name="isi_komentar" id="isi_komentar" cols="30" rows="2" style="width: 100%;"></textarea>
                        <input type="hidden" name="foto_id" value="{{ $foto->foto_id }}">
                        <button class="rounded-end border-0" type="submit" id="submit-komentar" style="background-color: #00044B; color: #fff;"><i class="fa-solid fa-paper-plane"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  @endforeach
  <!----------------------------- MODAL SHOW FOTO END -------------------------->



  <!----------------------------- MODAL BUAT ALBUM -------------------------->
  <div class="modal fade" id="addAlbum" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <img src="{{ asset('gllery.png') }}" alt="" style="width: 40px;">
          <h1 class="modal-title fs-5 ms-2" id="staticBackdropLabel">Gllery - Buat Album</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('addAlbum') }}" method="POST">
            @csrf
            <p>Silakan buat album baru dengan memberikan judul dan deskripsi.</p>
            <div class="mb-3">
              <label for="nama_album" class="form-label">Nama Album</label>
              <input type="text" class="form-control" id="nama_album" name="nama_album">
            </div>
            <div class="mb-4">
              <label for="deskripsi" class="form-label">Deskripso</label>
              <textarea class="rounded border-light-subtle form-control" name="deskripsi" id="deskripsi" cols="30" rows="2" style="width: 100%;"></textarea>
            </div>
            <button class="btn btn-gllery" style="width: 100%;" type="submit">Buat</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!----------------------------- MODAL BUAT ALBUM END -------------------------->



  <!----------------------------- MODAL UNGGAH FOTO -------------------------->
  <div class="modal fade" id="addFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form action="{{ route('addFoto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <img src="{{ asset('gllery.png') }}" alt="" style="width: 40px;">
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
              <input type="text" class="form-control" id="judul" name="judul_foto">
            </div>
            <div class="mb-3">
              <label for="deskripsi_foto" class="form-label">Deskripsi</label>
              <textarea class="rounded border-light-subtle form-control" name="deskripsi_foto" id="deskripsi_foto" cols="30" rows="2" style="width: 100%;"></textarea>
            </div>
            <div class="mb-3">
              <label for="kategori" class="form-label">Kategori</label>
              <select class="form-select" aria-label="Default select example" name="kategori">
                <option selected disabled>Pilih kategori</option>
                @foreach ($kategoris as $kategori)
                <option value="{{$kategori->kategori_id}}">{{ $kategori->judul_kategori }}</option>
                @endforeach
                @if (count($kategoris) == 0)
                <option disabled>Kategori tidak tersedia.</option>
                @endif
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
                <select class="form-select" aria-label="Default select example" name="album">
                  <option selected disabled>Pilih album</option>
                  @foreach ($albums as $album)
                  <option value="{{$album->album_id}}">{{ $album->nama_album }}</option>
                  @endforeach
                  @if (count($albums) == 0)
                  <option disabled>Kategori tidak tersedia.</option>
                  @endif
                </select>
              </div>
            </div>
            <div id="newAlbumSection" class="form-group icon-input" style="display: none;">
              <div class="mb-4">
                <label for="buat_album" class="form-label">Buat Album</label>
                <input type="text" class="form-control" id="buat_album" name="new_album">
              </div>
            </div>

            <script>
              document.getElementById("pilihAlbum").addEventListener("click", function() {
                document.getElementById("albumSection").style.display = "block";
                document.getElementById("newAlbumSection").style.display = "none";
                document.querySelector("select[name='album']").selectedIndex = 0;
              });

              document.getElementById("buatAlbum").addEventListener("click", function() {
                document.getElementById("albumSection").style.display = "none";
                document.getElementById("newAlbumSection").style.display = "block";
                document.querySelector("select[name='album']").selectedIndex = -1;
              });
            </script>
            <button class="btn btn-gllery" style="width: 100%;" type="submit">Unggah</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!----------------------------- MODAL UNGGAH FOTO END -------------------------->



  <!----------------------------- MODAL EDIT FOTO -------------------------->
  @foreach ($fotos as $foto)
  <div class="modal fade" id="editFoto{{ $foto->foto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6">
                <img src="{{ $foto->lokasi_foto }}" alt="{{ $foto->judul_foto }}" style="width: 100%;">
              </div>
              <div class="col-lg-6">
                <div class="p-3">
                  <div class="container-head pb-3 d-flex align-items-center justify-content-between border-bottom border-light-subtle">
                    <div class="user-section d-flex align-items-center">
                      @if ($foto->user)
                      <img src=" {{ asset('storage/' . $foto->user->profile_image) }}" alt="Profil Pengguna" style="width: 40px; height: 40px; border-radius: 50%;">
                      <p class="fs-6 fw-medium ms-2 mb-0">{{ $foto->user->username }}</p>
                      @endif
                    </div>
                  </div>
                  <div class="container-detail py-3" style="height: 100%; overflow-y: auto;">
                    <form action="{{ route('editFoto', ['id' => $foto->foto_id]) }}" method="POST">
                      @csrf
                      <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul_foto" value="{{ $foto->judul_foto }}">
                      </div>
                      <div class="mb-3">
                        <label for="deskripsi_foto" class="form-label">Deskripsi</label>
                        <textarea class="rounded border-light-subtle form-control" name="deskripsi_foto" cols="30" rows="2" style="width: 100%;">{{ $foto->deskripsi_foto }}</textarea>
                      </div>
                      <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" name="kategori">
                          @if(count($kategoris) == 0)
                          <option disabled selected>Kategori tidak tersedia</option>
                          @else
                          <option value="" disabled selected>Pilih kategori</option>
                          @foreach ($kategoris as $kategori)
                          <option value="{{ $kategori->kategori_id }}" @if ($kategori->kategori_id == $foto->kategori_id) selected @endif>{{ $kategori->judul_kategori }}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                      <div id="albumSection" class="form-group icon-input">
                        <div class="mb-4">
                          <label for="album" class="form-label">Pilih album</label>
                          <select class="form-select" aria-label="Default select example" name="album">
                            <option selected disabled>Pilih album</option>
                            @if(count($albums) == 0)
                            <option disabled selected>Album tidak tersedia</option>
                            @else
                            <option value="" disabled selected>Pilih Album</option>
                            @foreach ($albums as $album)
                            <option value="{{ $album->album_id }}" @if ($album->album_id == $foto->album_id) selected @endif>{{ $album->nama_album }}</option>
                            @endforeach
                            @endif
                          </select>
                        </div>
                      </div>
                      <button class="btn btn-gllery" style="width: 100%;" type="submit">Perbarui Unggah</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  @endforeach
  <!----------------------------- MODAL EDIT FOTO END -------------------------->




  <!----------------------------- MODAL REPORT -------------------------->
  <div class="modal fade" id="reportUngghan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <img src="{{ asset('gllery.png') }}" alt="" style="width: 40px;">
          <h1 class="modal-title fs-5 ms-2" id="staticBackdropLabel">Gllery - Report Unggahan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            @csrf
            <p>Maaf atas ketidak nyamanan anda, anda dapat melaporkan unggahan ini di sini.</p>
            <div class="form-check d-flex">
              <input class="form-check-input" type="radio" name="flexRadioDefault" style="width: 30px; height: 30px;">
              <label class="form-check-label ms-2" for="flexRadioDefault1">
                <p class="mb-1 fw-medium">Default radio</p>
                <p style="font-size: 12px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates repellendus iusto numquam tempore tenetur distinctio ad corrupti temporibus vitae eveniet!</p>
              </label>
            </div>
            <button class="btn btn-gllery" style="width: 100%;" type="submit">Report</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!----------------------------- MODAL REPORT END -------------------------->



  <!----------------------------- MODAL LOGIN REGISTER -------------------------->
  <div class="modal fade" id="loginRegisterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="modalLogin" id="modalLogin">
            <div class="modal-header">
              <img src="{{ asset('gllery.png') }}" alt="" style="width: 40px;">
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
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
          @csrf
          <div class="modalRegister" id="modalRegister" style="display: none;">
            <div class="modal-header">
              <img src="{{ asset('gllery.png') }}" alt="" style="width: 40px;">
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
              <div class="mb-4">
                <label for="profile_image" class="form-label">Foto Profil</label>
                <input class="image-crop-filepond" image-crop-aspect-ratio="1:1" type="file" id="profile_image" name="profile_image">
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



  <!----------------------------- MODAL EDIT PROFIL -------------------------->
  @if(auth()->check() && auth()->id() === $user->user_id)
  <div class="modal fade" id="editProfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <img src="{{ asset('gllery.png') }}" alt="" style="width: 40px;">
          <h1 class="modal-title fs-5 ms-2" id="staticBackdropLabel">Gllery - Edit Profil</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p>Lakukan edit data baru seputar profil anda.</p>
            <div class="mb-3">
              <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" name="nama_lengkap" value="{{ $user->nama_lengkap }}">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" value="{{ $user->username}}">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="rounded border-light-subtle form-control" name="alamat" cols="30" rows="2" style="width: 100%;">{{ $user->alamat}}</textarea>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $user->email}}">
            </div>
            <div class="mb-4">
              <label for="foto_profil" class="form-label">Foto Profil</label>
              <input type="file" class="form-control" name="profile_image" accept=".png, .jpg, .jpeg">
            </div>
            <button class="btn btn-gllery" style="width: 100%;" type="submit">Edit</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  @endif
  <!----------------------------- MODAL EDIT PROFIL END -------------------------->


  <!------------------------------------------------------- MODAL END ---------------------------------------------------->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
  <script src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
  <script src="{{ asset('assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
  <script src="{{ asset('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
  <script src="{{ asset('assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}"></script>
  <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
  <script src="{{ asset('assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}"></script>
  <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
  <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
  <script src="{{ asset('assets/static/js/pages/filepond.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <script>
    function openModal(photoId) {
      loadComments(photoId);
      loadLikeStatus(photoId);
    }
    // GET KOMENTAR BY FOTO_ID
    function loadComments(photoId) {
      $.ajax({
        url: "/get/comment/" + photoId,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          console.log(response);
          var commentList = $('#commentList_' + photoId);
          commentList.empty(); // Bersihkan daftar komentar sebelum menambahkan yang baru

          // Tampilkan setiap komentar dalam daftar
          response.comments.forEach(function(comment) {
            var commentItem = $('<div class="commentars d-flex"></div>');
            var fotoProfile = comment.user.profile_image ? "{{ asset('storage') }}/" + comment.user.profile_image : "{{ asset('assetsUser/img/av.png') }}";

            var commentContent = '<div class="profile-user"><img src="' + fotoProfile + '" alt="" style="width: 35px; height: 35px; border-radius: 50%;"></div><div class="detail-commentars"><div class="username-date d-flex align-items-center "><div class="username d-flex align-items-center"><h5 class="image-date ps-2 mb-1" style="font-size: 16px;"><a href="/profil/' + comment.user.user_id + '" class="text-decoration-none" style="color: #000;">' + comment.user.username + '</a></h5></div><div class="date text-body-tertiary d-flex align-items-center"><h5 style="font-size: 12px; margin-top: 6px; margin-left: 5px">' + formatTimeAgo(comment.created_at) + '</h5></div></div><p class="ps-2" style="font-size: 15px;">' + comment.isi_komentar + '</p></div>';

            commentItem.append(commentContent);
            commentList.append(commentItem);
          });

          // Tampilkan jumlah komentar
          $('#commentCount_' + photoId).text(response.comments.length);
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    }

    // AJAX KIRIM KOMENTAR
    $(document).ready(function() {
      $('form.commentForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);

        $.ajax({
          url: "{{ route('comments.photo') }}",
          type: 'POST',
          data: formData,
          dataType: 'json',
          processData: false,
          contentType: false,
          success: function(response) {
            loadComments(response.foto_id);
            // Handle respons dari server di sini
            console.log(response);
            $('textarea[name="isi_komentar"]').val('');
            toastr.success('Komentar berhasil dikirim', 'Success', {
              "progressBar": false,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "1500",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut",
              "closeButton": true,
              "toastClass": "toast-green-solid"
            });
            loadComments(response.foto_id);
          },
          error: function(xhr, status, error) {
            // Handle error di sini
            console.error(xhr.responseText);
            // Tampilkan notifikasi error dengan toastr.js
            toastr.error('Anda harus login atau register terlebih dahulu', 'Error', {
              "progressBar": false,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "1500",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut",
              "closeButton": true,
              "toastClass": "toast-red-solid"
            });
          }
        });
      });
    });

    // GET LIKE BY FOTO_ID
    function loadLikeStatus(photoId) {
      $.ajax({
        url: "{{ route('get-like-status') }}",
        type: 'GET',
        data: {
          foto_id: photoId
        },
        dataType: 'json',
        success: function(response) {
          // Handle response here
          console.log(response);

          $('#likeCount_' + photoId).text(response.like_count + ' likes');
          // Toggle button text and class based on user's like status
          if (response.user_liked) {
            $('#likeButton_' + photoId).removeClass('btn-like').addClass('btn-unlike d-flex align-items-center');
            $('#likeButton_' + photoId).html('<i style="color: #ff0000; font-size: 25px;" class="fa-solid fa-heart me-1"></i> <span id="likeCount_' + photoId + '">' + response.like_count + ' like</span>');
          } else {
            $('#likeButton_' + photoId).removeClass('btn-unlike').addClass('btn-like d-flex align-items-center');
            $('#likeButton_' + photoId).html('<i class="fa-regular fa-heart me-1" style="font-size: 25px;"></i> <span id="likeCount_' + photoId + '">' + response.like_count + ' like</span>');
          }
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    }

    // KIRIM LIKE 
    function toggleLike(photoId) {
      $.ajax({
        url: "{{ route('toggle-like') }}",
        type: 'POST',
        data: {
          foto_id: photoId,
          _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(response) {
          // Handle response here
          console.log(response);
          // Update like count
          $('#likeCount_' + photoId).text(response.like_count + ' likes');
          // Toggle button text and class based on user's like status
          if (response.action === 'liked') {
            $('#likeButton_' + photoId).removeClass('btn-like').addClass('btn-unlike d-flex align-items-center');
            $('#likeButton_' + photoId).html('<i style="color: #ff0000; font-size: 25px;" class="fa-solid fa-heart me-1"></i> <span id="likeCount_' + photoId + '">' + response.like_count + ' like</span>');
            toastr.success('Foto berhasil disukai', 'Success', {
              "progressBar": false,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "1500",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut",
              "closeButton": true,
              "toastClass": "toast-green-solid"
            });

          } else {
            $('#likeButton_' + photoId).removeClass('btn-unlike').addClass('btn-like d-flex align-items-center');
            $('#likeButton_' + photoId).html('<i class="fa-regular fa-heart me-1" style="font-size: 25px;"></i> <span id="likeCount_' + photoId + '">' + response.like_count + ' like</span>');
            toastr.success('Foto berhasil tidak disukai', 'Success', {
              "progressBar": false,
              "positionClass": "toast-top-right",
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "1500",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut",
              "closeButton": true,
              "toastClass": "toast-green-solid"
            });
          }
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
          toastr.error('Anda harus login atau register terlebih dahulu', 'Error', {
            "progressBar": false,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "1500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "closeButton": true,
            "toastClass": "toast-red-solid"
          });
        }
      });
    }

    // TOMBOL UNTUK MENJALANKAN AJAX LIKE
    $(document).on('click', '.btn-like', function() {
      var photoId = $(this).data('photoid');
      toggleLike(photoId);
    });

    // TOMBOL UNTUK MENJALANKAN AJAX UNLIKE
    $(document).on('click', '.btn-unlike', function() {
      var photoId = $(this).data('photoid');
      toggleLike(photoId);
    });

    // FORMAT WAKTU CREATE_AT
    function formatTimeAgo(timestamp) {
      const seconds = Math.floor((new Date() - new Date(timestamp)) / 1000);

      if (seconds < 60) {
        return `${Math.floor(seconds)} detik`;
      }
      let interval = Math.floor(seconds / 31536000);
      if (interval > 1) {
        return `${interval} tahun`;
      }
      interval = Math.floor(seconds / 2592000);
      if (interval > 1) {
        return `${interval} bulan`;
      }
      interval = Math.floor(seconds / 86400);
      if (interval > 1) {
        return `${interval} hari`;
      }
      interval = Math.floor(seconds / 3600);
      if (interval > 1) {
        return `${interval} jam`;
      }
      interval = Math.floor(seconds / 60);
      if (interval > 1) {
        return `${interval}m`;
      }
      return formatTimeAgo(new Date(timestamp).getTime() + 1000);
    }

    // FAB
    document.addEventListener("DOMContentLoaded", function() {
      var dropdownMenuButton = document.getElementById("dropdownMenuButton");
      var dropdownItems = document.querySelectorAll('.dropdown-item');

      dropdownMenuButton.addEventListener("click", function() {
        document.querySelector('.fab-container').style.display = 'none';
      });

      dropdownItems.forEach(function(item) {
        item.addEventListener('click', function() {
          document.querySelector('.fab-container').style.display = 'block';
        });
      });
    });
  </script>

  @if ($errors->any())
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Ada kesalahan dalam input Anda. Silakan periksa kembali! Pastikan input di isi semua.',
      // timer: 2000, 
      timerProgressBar: false,
      showConfirmButton: true
    });
  </script>
  @endif

  @if(session('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Sukses!',
      text: '{{ session('
      success ') }}',
      timer: 2000,
      timerProgressBar: true,
      showConfirmButton: false
    });
  </script>
  @endif

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
</body>

</html>