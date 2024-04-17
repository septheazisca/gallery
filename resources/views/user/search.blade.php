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


  <!----------------------------- UNGGAHAN -------------------------->
  <div class="container py-5">
    <div class="category-section">
      <p class="fs-5 fw-medium">Hasil Pencarian untuk: "{{ $query }}"</p>
      <div class="content-container m-0">
        @if ($results->isEmpty())
        <p class="fs-6">Gambar tidak ditemukan.</p>
        @else
        @foreach ($results as $result)
        <div class="box-content" data-bs-toggle="modal" data-bs-target="#showFoto{{ $result->foto_id }}">
          <img src="{{ $result->lokasi_foto }}" alt="{{ $result->judul_foto }}">
          <div class="content-hover">
            <div class="profil me-2">
              @if ($result->user && $result->user->profile_image)
              <img src="{{ Storage::url($result->user->profile_image) }}" alt="Profil Pengguna" style="width: 40px; height: 40px; border-radius: 50%;">
              @endif
            </div>
            <div class="text-content">
              <h3 class="image-title">{{ $result->judul_foto }}</h3>
              @if ($result->user)
              <p class="image-date">Unggahan oleh: {{ $result->user->username }}</p>
              @else
              <p class="image-date">Unggahan oleh: Pengguna tidak ditemukan</p>
              @endif
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>
  <!----------------------------- UNGGAHAN END -------------------------->


</body>

</html>