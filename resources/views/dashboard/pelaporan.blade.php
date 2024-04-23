@extends('dashboard.layout.main')

@section('sidebar')
@include('dashboard.layout.sidebar')
@endsection

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Postingan Dilaporkan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Postingan Dilaporkan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Postingan Dilaporkan</h5>
            <p>Lihat semua postingan yang dilaporkan oleh user dan hapus postingan.</p>
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
                    <th>Pemosting</th>
                    <th style="width: 300px;">Jenis Laporan</th>
                    <th>Pelapor</th>
                    <th>Status</th>
                    <th data-type="date" data-format="MM/DD/YYYY" style="width: 120px;">Waktu</th>
                    <th style="width: 120px;">Aksi</th>
                </thead>
                <tbody>
                  @php $number = 1 @endphp
                  @foreach($groupedReports as $foto_id => $reports)
                  <tr>
                    <td>{{ $number++ }}</td>
                    <td>
                      <img src="{{ $reports->first()->foto->lokasi_foto }}" alt="{{ $reports->first()->foto->judul_foto }}" style="width: 30px;">
                    </td>
                    <td>{{ $reports->first()->foto->user->username }}</td>
                    <td>
                      <ul class="p-1 m-0">
                        @foreach($reports as $report)
                        <li>
                          <div>{{ $report->jenisLaporan->jenis_laporan }}</div>
                        </li>
                        @endforeach
                      </ul>
                    </td>
                    <td>
                      <ul class="p-1 m-0">
                        @foreach($reports as $report)
                        <li>
                          <div>{{ $report->pelapor->username }}</div> <!-- Pelapor -->
                        </li>
                        @endforeach
                      </ul>
                    </td>
                    <td>
                      <ul class="p-1 m-0" style="list-style-type: none;">
                        @foreach($reports as $report)
                        <li>
                          <div class="badge text-bg-danger">{{ $report->status }}</div>
                        </li>
                        @endforeach
                      </ul>
                    </td>
                    <td>
                      @foreach($reports as $report)
                      <div>{{ $report->created_at->format('d/m/Y') }}</div> <!-- Waktu laporan -->
                      @endforeach
                    </td>
                    <td>
                      <!-- <button class="btn btn-warning-1" data-bs-toggle="modal" data-bs-target="#detailUnggahan"><i class="bi bi-eye"></i></button> -->
                      <button class="btn btn-danger-1 delete-category" data-id="{{ $foto_id }}"><i class="bi bi-trash"></i></button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('.delete-category').click(function() {
      var fotoId = $(this).data('id'); // Ambil ID foto
      var url = '{{ route("foto.delete") }}'; // Endpoint delete

      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: url,
            type: 'DELETE',
            data: {
              foto_id: fotoId,
              _token: '{{ csrf_token() }}' // CSRF token
            },
            success: function(response) {
              Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
              }).then(() => {
                location.reload(); // Muat ulang setelah penghapusan sukses
              });
            },
            error: function(xhr, status, error) {
              Swal.fire({
                title: "Error!",
                text: "There was an error deleting the file. Please try again.",
                icon: "error"
              });
            }
          });
        }
      });
    });
  });
</script>
@endsection