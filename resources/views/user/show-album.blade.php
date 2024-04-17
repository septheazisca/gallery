@extends('user.layout.master-user')
@section('content')
<!----------------------------- UNGGAHAN -------------------------->
<div class="container py-5" style="margin-top: 5.5rem;">
  <div class="category-section">
  <p class="fs-5 fw-medium">Unggahan Album "{{ $album->nama_album }}"</p> <!-- Tampilkan nama album -->
  <p>Jumlah Foto: {{ $fotos->count() }}</p> <!-- Tampilkan jumlah foto -->
    <div class="content-container m-0">
      @foreach ($fotos as $foto)
      <div class="box-content" data-bs-toggle="modal" data-bs-target="#showFoto{{ $foto->foto_id }}">
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