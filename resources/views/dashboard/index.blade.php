@extends('dashboard.layout.main')

@section('sidebar')
@include('dashboard.layout.sidebar')
@endsection

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Kategori <span>| Categorys</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-bookmarks"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $totalKategoris }}</h6>
                    <span class="text-muted small pt-2 ps-1">Kategori Tersedia</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Postingan <span>| Posts</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-images"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $totalFotos }}</h6>
                    <span class="text-muted small pt-2 ps-1">Unggahan User</span>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Pengguna <span>| Users</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $totalUsers }}</h6>
                    <span class="text-muted small pt-2 ps-1">User Gllery</span>
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Unggahan Terbaru</h5>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>
                        <b>#</b>
                      </th>
                      <th style="width: 130px;">
                        Unggahan
                      </th>
                      <th style="width: 250px;">Username Pengunggah</th>
                      <th style="width: 250px;">Judul Unggahan</th>
                      <th>Detail Unggahan</th>
                      <th data-type="date" data-format="YYYY/DD/MM">Waktu Input</th>
                  </thead>
                  <tbody>
                    @php $number = 1 @endphp
                    @foreach($latestFotos as $latestFoto)
                    <tr>
                      <td>{{$number++}}</td>
                      <td>
                        <img src="{{ $latestFoto->lokasi_foto }}" alt="{{ $latestFoto->judul_foto }}" style="width: 30px;">
                      </td>
                      <td>{{ $latestFoto->user->username }}</td>
                      <td>{{ $latestFoto->judul_foto }}</td>
                      <td>{{ $latestFoto->deskripsi_foto }}</td>
                      <td>{{ $latestFoto->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Pengguna Terbaru</h5>
              <!-- Table with stripped rows -->
              <table class="table ">
                <thead>
                  <tr>
                    <th><b>#</b></th>
                    <th>
                      Profil
                    </th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                  @php $number = 1 @endphp
                  @foreach($latestUsers as $latestUser)
                  <tr>
                    <td>
                      {{ $number++ }}
                    </td>
                    <td>
                      <img src="{{ asset('storage/' . $latestUser->profile_image) }}" alt="{{ $latestUser->username}}" style="width: 30px;">
                    </td>
                    <td>{{ $latestUser->username }}</td>
                    <td>{{ $latestUser->nama_lengkap }}</td>
                    <td>{{ $latestUser->email }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Kategori Terbaru</h5>

              <!-- Table with stripped rows -->
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <b>#</b>
                    </th>
                    <th style="width: 220px;">
                      Thumbnail Kategori
                    </th>
                    <th>Judul Kategori</th>
                    <th>Detail Kategori</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Waktu Input</th>
                  </tr>
                </thead>
                <tbody>
                  @php $number = 1 @endphp
                  @foreach($latestkategoris as $latestkategori)
                  <tr>
                    <td>
                      {{$number++}}
                    </td>
                    <td>
                      <img src="{{ asset('storage/' . $latestkategori->thumbnail_kategori) }}" alt="{{ $latestkategori->judul_kategori }}" style="width: 30px;">
                    </td>
                    <td>{{ $latestkategori->judul_kategori }}</td>
                    <td>{{ $latestkategori->deskripsi_kategori }}</td>
                    <td>{{ $latestkategori->created_at->format('d/m/Y') }}</td>
                  </tr>
                  @endforeach

                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div><!-- End Left side columns -->
    </div>
  </section>

</main><!-- End #main -->
@endsection