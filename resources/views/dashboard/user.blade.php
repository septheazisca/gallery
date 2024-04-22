@extends('dashboard.layout.main')

@section('sidebar')
@include('dashboard.layout.sidebar')
@endsection

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Pengguna</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Pengguna</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Pengguna</h5>
            <p>Lihat semua data profil user yang telah register.</p>
            <!-- <div class="d-flex align-items-center gap-2">
              <button type="button" class="btn btn-primary-1" data-bs-toggle="modal" data-bs-target="#tambahPengguna" data-bs-target="#staticBackdrop">Tambah Pengguna</button>
              <p class="mb-0">Tambah, lihat dan edit data seputar pengguna.</p>
            </div>
            <hr> -->
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>
                    <b>@php $number = 1 @endphp </b>
                  </th>
                  <th>
                    Profil
                  </th>
                  <th>Username</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th data-format="MM/DD/YYYY">Waktu Register</th>
                  <th style="width: 120px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td>
                    {{$number++}}
                  </td>
                  <td>
                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="{{ $user->username}}" style="width: 30px;">
                  </td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->nama_lengkap }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->created_at }}</td>
                  <td class="">
                    <button class="btn btn-warning-1" data-bs-toggle="modal" data-bs-target="#detailPengguna{{ $user->user_id }}" data-bs-target="#staticBackdrop"><i class="bi bi-eye"></i></button>
                    <!-- <button class="btn btn-danger-1 delete-category" data-id=""><i class="bi bi-trash"></i></button> -->
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
</main><!-- End #main -->

@foreach($users as $user)
<div class="modal fade" id="detailPengguna{{ $user->user_id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <img src="{{ asset('gllery.png') }}" alt="" style="width: 40px;">
        <h1 class="modal-title fs-5 ms-2 fw-semibold" id="staticBackdropLabel">Gllery - Detail Pengguna</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <div class="row">
                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="{{ $user->username }}" class="pb-3" style="width: 100%;">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="mb-3">
                  <label for="judul" class="col-form-label">Username</label>
                  <input type="text" name="judul" class="form-control" id="judul" value="{{ $user->username }}">
                </div>
                <div class="mb-3">
                  <label for="judul" class="col-form-label">Nama Lengkap</label>
                  <input type="text" name="judul" class="form-control" id="judul" value="{{ $user->nama_lengkap }}">
                </div>
                <div class="mb-3">
                  <label for="judul" class="col-form-label">Email</label>
                  <input type="text" name="judul" class="form-control" id="judul" value="{{ $user->nama_lengkap }}">
                </div>
                <div class="mb-3">
                  <label for="judul" class="col-form-label">Alamat</label>
                  <input type="text" name="judul" class="form-control" id="judul" value="{{ $user->username }}">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection