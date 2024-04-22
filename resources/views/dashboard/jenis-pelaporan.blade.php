@extends('dashboard.layout.main')

@section('sidebar')
@include('dashboard.layout.sidebar')
@endsection

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Jenis Pelaporan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Jenis Pelaporan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Jenis Pelaporan</h5>
            <div class="d-flex align-items-center gap-2">
              <button type="button" class="btn btn-primary-1" data-bs-toggle="modal" data-bs-target="#tambahJenisPelaporan" data-bs-target="#staticBackdrop">Tambah Jenis Pelaporan</button>
              <p class="mb-0">Tambah, lihat dan edit data seputar jenis pelaporan.</p>
            </div>
            <hr>
            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table datatable ">
                <thead>
                  <tr>
                    <th>
                      <b>#</b>
                    </th>
                    <th style="width: 300px;">Jenis Pelaporan</th>
                    <th>Deskripsi</th>
                    <th data-type="date" data-format="MM/DD/YYYY" style="width: 170px;">Waktu Posting</th>
                    <th style="width: 120px;">Aksi</th>
                </thead>
                <tbody>
                  @php $number = 1 @endphp
                  @foreach($fotos as $foto)
                  <tr>
                    <td style="width: 70px;">
                      {{$number++}}
                    </td>
                    <td>{{ $foto->user->username }}</td>
                    <td>{{ $foto->judul_foto }}</td>
                    <td>{{ $foto->created_at->format('d/m/Y') }}</td>
                    <td class="">
                      <button class="btn btn-warning-1" data-bs-toggle="modal" data-bs-target="#editenisJenisPelaporan" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square"></i></button>
                      <button class="btn btn-danger-1 delete-category" data-id="{{ $foto->foto_id }}"><i class="bi bi-trash"></i></button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- End Table with stripped rows -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

<!-- Modal Tambah -->
<div class="modal fade" id="tambahJenisPelaporan" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <img src="{{ asset('gllery.png') }}" alt="" style="width: 40px;">
        <h1 class="modal-title fs-5 ms-2 fw-semibold" id="staticBackdropLabel">Gllery - Tambah Jenis Pelaporan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="jenisPelaoran" class="col-form-label">Jenis Pelaporan:</label>
            <input type="text" name="jenis_pelaoran" class="form-control" id="jenisPelaoran">
          </div>
          <div class="mb-4">
            <label for="detail" class="col-form-label">Detail:</label>
            <textarea class="form-control" name="" id="" cols="30" rows="2"></textarea>
          </div>
          <button type="submit" class="btn btn-primary-1 mb-2" style="width: 100%;">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Edit -->
<div class="modal fade" id="editenisJenisPelaporan" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <img src="{{ asset('gllery.png') }}" alt="" style="width: 40px;">
        <h1 class="modal-title fs-5 ms-2 fw-semibold" id="staticBackdropLabel">Gllery - Edit Jenis Pelaporan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="jenisPelaoran" class="col-form-label">Jenis Pelaporan:</label>
            <input type="text" name="jenis_pelaoran" class="form-control" id="jenisPelaoran">
          </div>
          <div class="mb-3">
            <label for="detail" class="col-form-label">Detail:</label>
            <textarea class="form-control" name="" id="" cols="30" rows="2"></textarea>
          </div>
          <button type="submit" class="btn btn-primary-1 mb-2" style="width: 100%;">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection