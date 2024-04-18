@extends('user.layout.master-user')
@section('content')
<!----------------------------- USER INFORMASI -------------------------->
<div class="container py-5" style="margin-top: 5.5rem;">
  <div class="profil-section">
    <div class="img-profil">
      <img src="{{ Storage::url( $userss->profile_image) }}" alt="" style="width: 150px; border-radius: 100px;">
    </div>
    <div class="detail-profil">
      <h2>{{ $userss->nama_lengkap }}</h2>
      <p>{{ $userss->username }} | {{ $userss->email }}</p>
      <div class="btn-detail-profil">
        <button class="btn btn-profil">{{ $totalPost }} Unggahan</button>
        <button class="btn btn-profil">{{ $totalAlbum }} Album</button>
      </div>
    </div>
  </div>
</div>
<!----------------------------- USER INFORMASI END -------------------------->

<!----------------------------- ALBUM -------------------------->
<div class="container pt-3 pb-5 border-bottom">
  <div class="category-section">
    <div class="header-title">
      <p class="fs-5 fw-medium">Album {{ $userss->nama_lengkap }}</p>
      <p class="text-body-tertiary">{{ $totalAlbum }} tersedia</p>
    </div>
    <div class="container-profil m-0">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            @foreach ($albums as $album)
            <div class="col-lg-3">
              <a href="{{ route('showAlbum', ['album_id' => $album->album_id]) }}" class="text-decoration-none">
                <div class="card border-0 mb-3">
                  <div class="card-body p-4 bg-body-tertiary d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16" style="color: #00044B;">
                      <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                      <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z" />
                    </svg>
                  </div>
                  <div class="card-footer bg-transparent border-0 px-0 fs-5 ">
                    <p class="album-titel mb-0 fw-medium">{{ $album->nama_album }}</p>
                    <p class="mb-0 text-body-tertiary" style="font-size: 15px;">ananna</p>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!----------------------------- ALBUM END -------------------------->


<!----------------------------- UNGGAHAN -------------------------->
<div class="container py-5">
  <div class="category-section">
    <p class="fs-5 fw-medium">Unggahan {{ $userss->nama_lengkap }}</p>
    <div class="content-container m-0">
      @foreach ($fotos as $foto)
      <div class="box-content" data-bs-toggle="modal" data-bs-target="#showFoto{{ $foto->foto_id }}" onclick="openModal({{ $foto->foto_id }})">
        <img src="{{ $foto->lokasi_foto }}" alt="{{ $foto->judul_foto }}">
        <div class="content-hover">
          <div class="profil me-2">
            @if ($foto->user)
            <img src=" {{ asset('storage/' . $foto->user->profile_image) }}" alt="Profil Pengguna" style="width: 40px; height: 40px; border-radius: 50%;">
            @endif
          </div>
          <div class="text-content">
            <h3 class="image-title">{{ $foto->judul_foto }}</h3>
            @if ($foto->user)
            <p class="image-date">Unggahan oleh: {{ $foto->user->username }}</p>
            @else
            <p class="image-date">Unggahan oleh: Pengguna tidak ditemukan</p>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!----------------------------- UNGGAHAN END -------------------------->
@endsection