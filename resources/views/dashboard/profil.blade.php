@extends('dashboard.layout.main')

@section('sidebar')
@include('dashboard.layout.sidebar')
@endsection

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Profil</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card pb-5 pt-5">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Profile" class="rounded-circle">
            <h2>GlleryAdmin</h2>
            <h3>Super Admin</h3>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Ringkasan</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profil</button>
              </li>
            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Tentang</h5>
                <p class="small fst-italic">Super admin Gllery memiliki peran penting dalam mengelola Gllery. Mereka bertanggung jawab atas pengaturan, pengawasan, dan pengelolaan konten serta fungsionalitas Gllery secara keseluruhan. 
                  
                </p>

                <h5 class="card-title">Detail Profil</h5>
                @foreach($data as $dataprofil)
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                  <div class="col-lg-9 col-md-8">{{ $dataprofil->nama_lengkap }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Username</div>
                  <div class="col-lg-9 col-md-8">{{ $dataprofil->username }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $dataprofil->email }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Alamat</div>
                  <div class="col-lg-9 col-md-8">{{ $dataprofil->alamat }}</div>
                </div>
                @endforeach
              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                <!-- Profile Edit Form -->
                <form action="{{ route('update') }}" method="post">
                  @csrf
                  @foreach($data as $dataprofil)
                  <!-- <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="assets/img/profile-img.jpg" alt="Profile">
                      <div class="pt-2">
                        <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                      </div>
                    </div>
                  </div> -->

                  <div class="row mb-3">
                    <label for="nama_lengkap" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap" value="{{$dataprofil->nama_lengkap}}" style="pointer-events: none;">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="username" type="text" class="form-control" id="username" value="{{$dataprofil->username}}" style="pointer-events: none;">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="text" class="form-control" id="email" value="{{$dataprofil->email}}" style="pointer-events: none;">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="alamat" class="form-control" id="alamat" style="height: 100px; pointer-events: none;">{{$dataprofil->alamat}}</textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="old_password" class="col-md-4 col-lg-3 col-form-label">Passwerd Lama</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="old_password" type="password" class="form-control" id="old_password" placeholder="Masukan password lama anda">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="new_password" class="col-md-4 col-lg-3 col-form-label">Passwerd Baru</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="new_password" type="password" class="form-control" id="new_password" placeholder="Masukan password baru anda">
                    </div>
                  </div>

                  @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif

                  @if (session('error'))
                  <div class="alert alert-danger">
                    {{ session('error') }}
                  </div>
                  @endif

                  @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                  @endif

                  <div class="text-end">
                    <button type="submit" class="btn btn-primary-1">Simpan Perubahan</button>
                  </div>
                  @endforeach
                </form><!-- End Profile Edit Form -->

              </div>
            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection