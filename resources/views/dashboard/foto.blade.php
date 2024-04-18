@extends('dashboard.layout.main')

@section('sidebar')
@include('dashboard.layout.sidebar')
@endsection

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Postingan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Postingan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Postingan</h5>
            <p>Lihat semua foto yang di postingan oleh user.</p>
            <!-- <div class="d-flex align-items-center gap-2">
              <button type="button" class="btn btn-primary-1" data-bs-toggle="modal" data-bs-target="#tambahPostingan" data-bs-target="#staticBackdrop">Tambah Postingan</button>
              <p class="mb-0">Tambah, lihat dan edit data seputar postingan.</p>
            </div>
            <hr> -->
            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table datatable ">
                <thead>
                  <tr>
                    <th>
                      <b>#</b>
                    </th>
                    <th style="width: 130px;">
                      Postingan
                    </th>
                    <th style="width: 250px;">Username Pemosting</th>
                    <th style="width: 250px;">Judul Postingan</th>
                    <th>Detail Postingan</th>
                    <th data-type="date" data-format="MM/DD/YYYY">Waktu Posting</th>
                    <th style="width: 120px;">Aksi</th>
                </thead>
                <tbody>
                  @php $number = 1 @endphp
                  @foreach($fotos as $foto)
                  <tr>
                    <td>
                      {{$number++}}
                    </td>
                    <td>
                      <img src="{{ $foto->lokasi_foto }}" alt="{{ $foto->judul_foto }}" style="width: 30px;">
                    </td>
                    <td>{{ $foto->user->username }}</td>
                    <td>{{ $foto->judul_foto }}</td>
                    <td>{{ $foto->deskripsi_foto }}</td>
                    <td>{{ $foto->created_at->format('d/m/Y') }}</td>
                    <td class="">
                      <button class="btn btn-warning-1" data-bs-toggle="modal" data-bs-target="#detailUnggahan{{ $foto->foto_id }}" data-bs-target="#staticBackdrop"><i class="bi bi-eye"></i></button>
                      <!-- <button class="btn btn-danger-1 delete-category" data-id=""><i class="bi bi-trash"></i></button> -->
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

@foreach ($fotos as $foto)
<div class="modal fade" id="detailUnggahan{{ $foto->foto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="row">
        <div class="col-lg-12">
          <img src="{{ $foto->lokasi_foto }}" alt="{{ $foto->judul_foto }}" style="width: 100%;">
          <div class="p-3">
            <div class="container-head pb-3 d-flex align-items-center justify-content-between border-bottom border-light-subtle">
              <div class="user-section d-flex align-items-center">
                @if ($foto->user)
                <img src=" {{ asset('storage/' . $foto->user->profile_image) }}" alt="Profil Pengguna" style="width: 40px; height: 40px; border-radius: 50%;">
                <p class="fs-6 fw-medium ms-2 mb-0"><a href="/profil/{{ $foto->user->user_id }}" class="text-decoration-none text-dark">{{ $foto->user->username }}</a></p>
                @endif
              </div>
            </div>
            <div class="container-detail py-3" style="">
              <h4>{{ $foto->judul_foto }}</h4>
              <p class="fs-6">{{ $foto->deskripsi_foto }}
                <span class="ms-2" style="font-size: 12px;">
                  @if(\Carbon\Carbon::parse($foto->created_at)->diffInDays() > 7)
                  {{ \Carbon\Carbon::parse($foto->created_at)->locale('id')->isoFormat('D MMMM YYYY') }}
                  @else
                  {{ \Carbon\Carbon::parse($foto->created_at)->locale('id')->diffForHumans() }}
                  @endif
                </span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endforeach
@endsection