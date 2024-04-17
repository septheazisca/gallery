@extends('user.layout.master-user')
@section('content')
<div class="container py-5">
  <div class="category-section">
    <p class="fs-5 fw-medium">Kategori {{ $showKategori->judul_kategori }}</p>
    <p class="fs-6 text-body-tertiary">{{ $fotos->count() }} unggahan yang menggunakan kategori {{ $showKategori->judul_kategori }}.</p>
    @if ($fotos->isEmpty())
    <p class="fs-6 "><b>Belum ada gambar yang menggunakan kategori "{{ $showKategori->judul_kategori }}".</b></p>
    @else
    <div class="content-container m-0">
      @foreach ($fotos as $foto)
      <div class="box-content" data-bs-toggle="modal" data-bs-target="#showFoto{{ $foto->foto_id }}">
        <img src="{{ $foto->lokasi_foto }}" alt="{{ $foto->judul_foto }}">
        <div class="content-hover">
          <div class="profil me-2">
            @if ($foto->user && $foto->user->profile_image)
            <img src="{{ Storage::url($foto->user->profile_image) }}" alt="Profil Pengguna" style="width: 40px; height: 40px; border-radius: 50%;">
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
      @endif
    </div>
  </div>
</div>
@endsection