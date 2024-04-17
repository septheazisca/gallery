@extends('user.layout.master-user')
@section('content')
<div class="container py-5">
  <div class="category-section">
    <div class="header-title">
      <p class="fs-5 fw-medium">Unggahan Terbaru</p>
      <p class="text-body-tertiary">tersedia {{ $kategoris->count() }} kategori</p>
    </div>
    <div class="container-kategori m-0 mt-5">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            @foreach ($kategoris as $kategori)
            <div class="col-lg-3">
            <a href="{{ route('showKategori', $kategori->kategori_id) }}" class="text-decoration-none">
              <div class="card border-0 mb-3" style="max-width: 18rem;">
                <div class="card-body p-0">
                  <img src="{{ Storage::url($kategori->thumbnail_kategori) }}" alt="{{ $kategori->judul_kategori }}" style="width: 100%;">
                </div>
                <div class="card-footer bg-transparent border-0 px-0 fs-5">{{ $kategori->judul_kategori }}</div>
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
@endsection