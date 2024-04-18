@extends('user.layout.master-user')
@section('content')
<div class="container py-5" style="margin-top: 5.5rem;">
  <div class="category-section">
    <p class="fs-5 fw-medium">Hasil Pencarian untuk: "{{ $query }}"</p>
    <div class="content-container m-0">
      @if ($results->isEmpty())
      <p class="fs-6">Gambar tidak ditemukan.</p>
      @else
      @foreach ($results as $result)
      <div class="box-content" data-bs-toggle="modal" data-bs-target="#showFoto{{ $result->foto_id }}" onclick="openModal({{ $result->foto_id }})">
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
@endsection