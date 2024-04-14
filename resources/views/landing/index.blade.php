@extends('landing.layout.main')

@section('content')
<div class="content-wrapper">
  <div class="container" style="margin-top: 90px;">
    <div class="row">
      <div class="col-lg-12">

        <!-- Updates from Subscriptions -->
        <div class="content-block">
          <div class="cb-header">
            <div class="row">
              <div class="col-lg-12 col-sm-10 col-xs-10">
                <ul class="list-inline">
                  <li><a href="#">Kategori</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="">
            <div class="row">
              <ul class="category-list" style="padding: 20px;">
                @foreach($kategoris as $kategori)
                <li><a href="#">{{ $kategori->judul_kategori }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <!-- /Updates from Subscriptions -->

        <!-- Featured Videos -->
        <div class="content-block head-div">
          <div class="cb-header">
            <div class="row">
              <div class="col-lg-10 col-sm-10 col-xs-8">
                <ul class="list-inline">
                  <li class="hidden-xs"><a href="#">Unggahan Terbaru</a></li>
                </ul>
              </div>
              <!-- <div class="col-lg-2 col-sm-2 col-xs-4">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Urutkan Berdasarkan <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div> -->
            </div>
          </div>
          <div class="content-container">
            <div class="box-content">
              <img src="https://images.pexels.com/photos/18031828/pexels-photo-18031828/free-photo-of-composition-of-jewelry-dried-flowers-and-books.jpeg?auto=compress&cs=tinysrgb&w=400&lazy=load">
              <div class="content-hover">
                <div class="text-content">
                  <h3 class="image-title">Judulllllllllllllllllllllllllllllllll</h3>
                  <p class="image-date">tanggal</p>
                </div>
                <div class="like-icon-div">
                  <label for="card-1-like" class="like-icon-div-child" style="margin-right: 15px;">
                    <input type="checkbox" id="card-1-like" style="opacity: 0;">
                    <i class="far fa-heart heart-empty" style="font-size: 25px;"></i>
                    <i class="fas fa-heart heart-fill" style="font-size: 25px;"></i>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Featured Videos -->
      </div>
    </div>
  </div>
</div>
@endsection