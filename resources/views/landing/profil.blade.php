@extends('landing.layout.main')

@section('content')
<!-- channel -->
<div class="container-fluid">
  <div class="row">
    <div class="img">
      <div class="img-image">
        <img src="images/channel-banner.png" alt="" class="c-banner">
      </div>
      <div class="c-avatar">
        <a href="#"><img src="images/channel-user.png" alt=""></a>
      </div>
    </div>
  </div>
</div>
<!-- ///channel -->


<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">

        <div class="channel-details">
          <div class="row">
            <div class="col-lg-10 col-lg-offset-2 col-xs-12">
              <div class="c-details">
                <div class="c-name">
                  NaughtyDog
                  <div class="c-checkbox">
                    <img src="images/verified-profile-icon.png" alt="">
                  </div>
                </div>
                <div class="c-nav">
                  <ul class="list-inline">
                    <li><a href="#">Videos</a></li>
                    <li><a href="#">Playlist</a></li>
                    <li class="hidden-xs"><a href="#">Channels</a></li>
                    <li class="hidden-xs"><a href="#">Discussion</a></li>
                    <li class="hidden-xs"><a href="#">About</a></li>
                    <li class="hidden-xs"><a href="#">Donate</a></li>
                  </ul>
                  <div class="btn-group dropup pull-right">
                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Discussion <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                      <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                      <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                      <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                      <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                    </ul>
                  </div>
                </div>
                <div class="c-sub pull-right hidden-xs">
                  <div class="c-sub-wrap">
                    <div class="c-f">
                      Subscribe
                    </div>
                    <div class="c-s">
                      22,548,145
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Album Videos -->
        <div class="content-block">
          <div class="cb-header">
            <div class="row">
              <div class="col-lg-8 col-xs-6">
                <div class="btn-group bg-clean">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Album
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="cb-content">
            <div class="row">

              <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="b-playlist">
                  <div class="v-img">
                    <img src="images/video1-1.png" alt="" class="l-1" />
                    <img src="images/video1-2.png" alt="" class="l-2" />
                    <a href="single-video-tabs.html"><img src="images/playlist-1.png" alt="" class="l-3" /></a>
                    <div class="items">20</div>
                  </div>
                  <div class="v-desc">
                    <a href="#">There Can Only Be One! Introducing Tanc & Hercules</a>
                  </div>
                  <div class="v-views">
                    127,548 views. <span class="v-percent"><span class="v-circle"></span> 78%</span>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="b-playlist">
                  <div class="v-img">
                    <img src="images/video2-1.png" alt="" class="l-1" />
                    <img src="images/video2-2.png" alt="" class="l-2" />
                    <a href="single-video-tabs.html"><img src="images/playlist-2.png" alt="" class="l-3"></a>
                    <div class="items">15</div>
                  </div>
                  <div class="v-desc">
                    <a href="#">Pokémon 3: The Movie - Spell Of The Unown: Entei HD...</a>
                  </div>
                  <div class="v-views">
                    18,241,542 views. <span class="v-percent"><span class="v-circle"></span> 93%</span>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="b-playlist">
                  <div class="v-img">
                    <img src="images/video2-6.png" alt="" class="l-1" />
                    <img src="images/video2-4.png" alt="" class="l-2" />
                    <a href="single-video-tabs.html"><img src="images/playlist-3.png" alt="" class="l-3"></a>
                    <div class="items">7</div>
                  </div>
                  <div class="v-desc">
                    <a href="#">Bullet Trains and Octopus Balls in South Korea</a>
                  </div>
                  <div class="v-views">
                    729,347 views . <span class="v-percent"><span class="v-circle"></span> 95%</span>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="b-playlist">
                  <div class="v-img">
                    <img src="images/video1-6.png" alt="" class="l-1" />
                    <img src="images/video1-4.png" alt="" class="l-2" />
                    <a href="single-video-tabs.html"><img src="images/playlist-4.png" alt="" class="l-3"></a>
                    <div class="items">27</div>
                  </div>
                  <div class="v-desc">
                    <a href="#">Top 10 NEW 3DS Games Of 2016 that blew our mind</a>
                  </div>
                  <div class="v-views">
                    79,239,852 views. <span class="v-percent"><span class="v-circle"></span> 84%</span>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /Album Videos -->

        <hr>

        <!-- Album Videos -->
        <div class="content-block">
          <div class="cb-header">
            <div class="row">
              <div class="col-lg-8 col-xs-6">
                <div class="btn-group bg-clean">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Unggahan Terbaru
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="cb-content videolist">
            <div class="row">
              <div class="content-container">
                @if($fotos->isEmpty())
                <p style="padding-left: 28px;">Tidak ada unggahan.</p>
                @else
                @foreach($fotos as $foto)
                <div class="box-content">
                  <img src="{{ $foto->lokasi_foto }}" alt="{{ $foto->judul_foto }}">
                  <div class="content-hover">
                    <div class="text-content">
                      <h3 class="image-title">{{ $foto->judul_foto }}</h3>
                      <p class="image-date">{{ $foto->tanggal_unggahan }}</p>
                    </div>
                  </div>
                  <div class="like-icon-div">
                    <!-- <label for="card-1-like" class="like-icon-div-child" style="margin-right: 15px;">
                    <input type="checkbox" class="card-1-like" style="opacity: 0;">
                    <i class="far fa-heart heart-empty" style="font-size: 25px;"></i>
                    <i class="fas fa-heart heart-fill" style="font-size: 25px;"></i>
                </label> -->
                  </div>
                </div>
                @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
        <!-- /Album Videos -->
      </div>
    </div>
  </div>
</div>
@endsection