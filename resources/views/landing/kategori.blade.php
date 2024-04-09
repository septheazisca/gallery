@extends('landing.layout.main')

@section('content')
<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 v-categories">

        <br>
        <br>
        <br>
        <br>
        <!-- Popular Channels -->
        <div class="content-block">
          <div class="cb-header">
            <div class="row">
              <div class="col-lg-10">
                <ul class="list-inline">
                  <li><a href="#" class="color-active">Cari berdasarkan kategori</a></li>
                  <!-- <li><a href="#">Most Popular</a></li>
                  <li><a href="#">Trending</a></li>
                  <li class="hidden-xs"><a href="#">Most Recent</a></li>
                  <li class="hidden-xs"><a href="#">A - Z</a></li>
                </ul> -->
              </div>
            </div>
          </div>
          <div class="cb-content">
            <div class="row">
              @foreach($kategoris as $kategori)
              <a href="">
                <div class="col-lg-2 col-xs-6 col-sm-3">
                  <div class="b-category">
                    <a href="#"><img src="{{ asset('storage/' . $kategori->thumbnail_kategori) }}" alt="{{ $kategori->judul_kategori }}"></a>
                    <a href="#" class="name">{{ $kategori->judul_kategori }}</a>
                    <p class="desc">1235 Videos</p>
                  </div>
                </div>
              </a>
              @endforeach

            </div>
          </div>
        </div>
        <!-- /Popular Channels -->
      </div>
    </div>
  </div>
</div>
@endsection