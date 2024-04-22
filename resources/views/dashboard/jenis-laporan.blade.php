@extends('dashboard.layout.main')

@section('sidebar')
@include('dashboard.layout.sidebar')
@endsection

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Jenis Laporan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Jenis Laporan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Jenis Laporan</h5>
            <div class="d-flex align-items-center gap-2">
              <button type="button" class="btn btn-primary-1" data-bs-toggle="modal" data-bs-target="#tambahJenisLaporan" data-bs-target="#staticBackdrop">Tambah Jenis Laporan</button>
              <p class="mb-0">Tambah, lihat dan edit data seputar jenis Laporan.</p>
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
                    <th style="width: 300px;">Jenis laporan</th>
                    <th>Deskripsi</th>
                    <th data-type="date" data-format="MM/DD/YYYY" style="width: 170px;">Waktu Posting</th>
                    <th style="width: 120px;">Aksi</th>
                </thead>
                <tbody>
                  @php $number = 1 @endphp
                  @foreach($jenisLaporans as $jenisLaporan)
                  <tr>
                    <td style="width: 70px;">
                      {{$number++}}
                    </td>
                    <td>{{ $jenisLaporan->jenis_laporan }}</td>
                    <td>{{ $jenisLaporan->deskripsi }}</td>
                    <td>{{ $jenisLaporan->created_at->format('d/m/Y') }}</td>
                    <td class="">
                      <button class="btn btn-warning-1" data-bs-toggle="modal" data-bs-target="#editenisJenisLaporan{{ $jenisLaporan->jenislaporan_id }}" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square"></i></button>
                      <button class="btn btn-danger-1 delete-category" data-id="{{ $jenisLaporan->jenislaporan_id }}"><i class="bi bi-trash"></i></button>
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
<div class="modal fade" id="tambahJenisLaporan" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <img src="{{ asset('gllery.png') }}" alt="" style="width: 40px;">
        <h1 class="modal-title fs-5 ms-2 fw-semibold" id="staticBackdropLabel">Gllery - Tambah Jenis Laporan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('jenis-laporan.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="jenisLaoran" class="col-form-label">Jenis Laporan:</label>
            <input type="text" name="jenis_laporan" class="form-control">
          </div>
          <div class="mb-4">
            <label for="detail" class="col-form-label">Detail:</label>
            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="2"></textarea>
          </div>
          <button type="submit" class="btn btn-primary-1 mb-2" style="width: 100%;">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Edit -->
@foreach($jenisLaporans as $jenisLaporan)
<div class="modal fade" id="editenisJenisLaporan{{ $jenisLaporan->jenislaporan_id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <img src="{{ asset('gllery.png') }}" alt="" style="width: 40px;">
        <h1 class="modal-title fs-5 ms-2 fw-semibold" id="staticBackdropLabel">Gllery - Edit Jenis Laporan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('jenis-laporan.update', ['id' => $jenisLaporan->jenislaporan_id]) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="jenisLaoran" class="col-form-label">Jenis Laporan:</label>
            <input type="text" name="jenis_laporan" class="form-control" value="{{ $jenisLaporan->jenis_laporan }}">
          </div>
          <div class="mb-3">
            <label for="detail" class="col-form-label">Detail:</label>
            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="2">{{ $jenisLaporan->deskripsi }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary-1 mb-2" style="width: 100%;">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@if(session('success'))
<script>
  Swal.fire({
    icon: 'success',
    title: 'Sukses!',
    text: '{{ session("success") }}',
    showConfirmButton: false,
    timer: 2000
  });
</script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.delete-category').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const itemId = this.dataset.id; // Ambil ID dari data-id
            const form = document.createElement('form'); // Buat formulir untuk penghapusan
            form.action = `/jenis-laporan/delete/${itemId}`; // Ubah sesuai route
            form.method = 'POST';
            form.style.display = 'none';

            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}'; // Tambahkan CSRF token

            const method = document.createElement('input');
            method.type = 'hidden';
            method.name = '_method';
            method.value = 'DELETE'; // Untuk permintaan DELETE

            form.appendChild(csrfToken);
            form.appendChild(method);

            Swal.fire({
                title: 'Peringatan',
                text: 'Apakah Anda yakin ingin menghapus item ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.body.appendChild(form); // Tambahkan formulir ke body
                    form.submit(); // Kirim formulir untuk menghapus item
                }
            });
        });
    });
});
</script>
@endsection