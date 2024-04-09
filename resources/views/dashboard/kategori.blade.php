@extends('dashboard.layout.main')

@section('sidebar')
@include('dashboard.layout.sidebar')
@endsection

@section('content')

@if(session('success'))
<script>
  // Menampilkan SweetAlert dengan pesan sukses
  Swal.fire({
    icon: 'success',
    title: 'Sukses!',
    text: '{{ session('
    success ') }}',
    showConfirmButton: false,
    timer: 2000
  });
</script>
@endif

@if ($errors->any())
<script>
  // Menampilkan SweetAlert dengan pesan error input kosong
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Ada inputan yang kosong. Silakan isi semua inputan.',
  });
</script>
@endif

@if(session('error'))
<script>
  // Menampilkan SweetAlert dengan pesan error lainnya
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: '{{ session('
    error ') }}',
  });
</script>
@endif






<main id="main" class="main">

  <div class="pagetitle">
    <h1>Kategori</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Kategori</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Kategori</h5>
            <div class="d-flex align-items-center gap-2">
              <button type="button" class="btn btn-primary-1" data-bs-toggle="modal" data-bs-target="#tambahKategori" data-bs-target="#staticBackdrop">Tambah Kategori</button>
              <p class="mb-0">Tambah, lihat dan edit data seputar kategori unggahan.</p>
            </div>
            <hr>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th style="width: 220px;">
                    Thumbnail Kategori
                  </th>
                  <th>Judul Kategori</th>
                  <th>Detail Kategori</th>
                  <th data-type="date" data-format="YYYY/DD/MM">Waktu Input</th>
                  <th style="width: 120px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($kategoris as $kategori)
                <tr>
                  <td>
                    <img src="{{ asset('storage/' . $kategori->thumbnail_kategori) }}" alt="{{ $kategori->judul_kategori }}" style="width: 30px;">
                  </td>
                  <td>{{ $kategori->judul_kategori }}</td>
                  <td>{{ $kategori->deskripsi_kategori }}</td>
                  <td>{{ $kategori->created_at->format('d/m/Y') }}</td>
                  <td>
                    <button class="btn btn-warning-1" data-bs-toggle="modal" data-bs-target="#editKategori{{$kategori->kategori_id}}" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-danger-1"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
            <!-- End Table with stripped rows -->


            <!-- Modal Tambah -->
            <div class="modal fade" id="tambahKategori" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                        <label for="thumbnail" class="col-form-label">Thumbnail Kategori:</label>
                        <input type="file" name="thumbnail" class="form-control" accept=".png, .jpg, .jpeg" id="thumbnail">
                      </div>
                      <div class="mb-3">
                        <label for="judul" class="col-form-label">Judul Kategori:</label>
                        <input type="text" name="judul" class="form-control" id="judul">
                      </div>
                      <div class="mb-3">
                        <label for="detail" class="col-form-label">Detail Kategori:</label>
                        <textarea name="detail" class="form-control" id="detail"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <!-- Edit Tambah -->
            @foreach($kategoris as $kategori)
            <form action="">
              <div class="modal fade" id="editKategori{{$kategori->kategori_id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="row">
                              <img src="{{ asset('storage/' . $kategori->thumbnail_kategori) }}" alt="{{ $kategori->judul_kategori }}" class="pb-3" style="width: 100%;">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="row">
                              <div class="mb-3">
                                <br>
                                <label for="thumbnail" class="col-form-label">Thumbnail Kategori:</label>
                                <input type="file" name="thumbnail" class="form-control" accept=".png, .jpg, .jpeg" id="thumbnail">
                              </div>
                              <div class="mb-3">
                                <label for="judul" class="col-form-label">Judul Kategori:</label>
                                <input type="text" name="judul" class="form-control" id="judul" value="{{ $kategori->judul_kategori }}">
                              </div>
                              <div class="mb-3">
                                <label for="detail" class="col-form-label">Detail Kategori:</label>
                                <textarea name="detail" class="form-control" id="detail">{{ $kategori->deskripsi_kategori }}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection