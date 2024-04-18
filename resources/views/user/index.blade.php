@extends('user.layout.master-user')
@section('content')
<!----------------------------- KATEGORI -------------------------->

<div class="container py-5 border-bottom" style="margin-top: 5.5rem;">
  <div class="category-section">
    <p class="fs-5 fw-medium">Kategori</p>
    @foreach($showKategoris as $showKategori)
    <button class="btn btn-kategori py-2 px-4 mb-2 me-1">
      <a href="{{ route('showKategori', ['kategori_id' => $showKategori->kategori_id]) }}" class="text-decoration-none">{{ $showKategori->judul_kategori }}</a>
    </button>
    @endforeach
  </div>
</div>
<!----------------------------- KATEGORI END -------------------------->



<!----------------------------- UNGGAHAN -------------------------->
<div class="container py-5">
  <div class="category-section">
    <p class="fs-5 fw-medium">Unggahan Untuk Anda</p>
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