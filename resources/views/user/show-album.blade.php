@extends('user.layout.master-user')
@section('content')
<!----------------------------- UNGGAHAN -------------------------->
<div class="container py-5" style="margin-top: 5.5rem;">
  <div class="category-section d-flex">
    <p class="fs-5 fw-medium m-0">Unggahan Album "{{ $album->nama_album }}"
      @if(Auth::check() && $album->user_id == Auth::user()->user_id)
      <a data-bs-toggle="modal" data-bs-target="#editAlbum" class="ms-2 text-decoration-none">
        <i class="fa-regular fa-pen-to-square" style="color: #00044B;"></i>
      </a>
      |
      <a href="{{ route('deleteAlbum', ['id' => $album->album_id]) }}" class="delete-form text-decoration-none">
        <i class="fa-regular fa-trash-can text-danger"></i>
        <form action="{{ route('deleteAlbum', ['id' => $album->album_id]) }}" method="POST" class="d-none">
          @csrf
          @method('DELETE')
        </form>
      </a>
      @endif
  </div>

  <p class="pt-2 fw-medium">{{ $album->deskripsi }}</p> <!-- Tampilkan jumlah foto -->
  <p>Jumlah Foto: {{ $fotos->count() }}</p> <!-- Tampilkan jumlah foto -->
  <div class="content-container m-0">
    @foreach ($fotos as $foto)
    <div class="box-content" data-bs-toggle="modal" data-bs-target="#showFoto{{ $foto->foto_id }}" onclick="openModal({{ $foto->foto_id }})">
      <img src="{{ $foto->lokasi_foto }}" alt="{{ $foto->judul_foto }}">
      <div class="content-hover">
        <div class="profil me-2">
          @if ($foto->user)
          <img src=" {{ asset('storage/' . $foto->user->profile_image) }}" alt="Profil Pengguna" style="width: 40px; height: 40px; border-radius: 50%;">
          @endif
        </div>
        <div class="text-content">
          <h3 class="image-title">{{ $foto->judul_foto }}</h3>
          @if ($foto->user)
          <p class="image-date">Unggahan oleh: {{ $foto->user->username }}</p>
          @else
          <p class="image-date">Unggahan oleh: Pengguna tidak ditemukan</p>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</div>
<!----------------------------- UNGGAHAN END -------------------------->


<!----------------------------- MODAL EDIT ALBUM -------------------------->
<div class="modal fade" id="editAlbum" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <img src="{{ asset('gllery.png') }}" alt="" style="width: 40px;">
        <h1 class="modal-title fs-5 ms-2" id="staticBackdropLabel">Gllery - Edit Album</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('editAlbum', ['id' => $album->album_id]) }}" method="POST">
          @csrf
          <p>Lakukan upadate data album di sini.</p>
          <div class="mb-3">
            <label for="nama_album" class="form-label">Nama Album</label>
            <input type="text" class="form-control" name="nama_album" value="{{ $album->nama_album }}">
          </div>
          <div class="mb-4">
            <label for="deskripsi" class="form-label">Deskripso</label>
            <textarea class="rounded border-light-subtle form-control" name="deskripsi" cols="30" rows="2" style="width: 100%;">{{ $album->deskripsi }}</textarea>
          </div>
          <button class="btn btn-gllery" style="width: 100%;" type="submit">Edit</button>
        </form>
      </div>
    </div>

  </div>
</div>
<!----------------------------- MODAL EDIT ALBUM END -------------------------->

<!-- <script>
  document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      const url = this.getAttribute('action');
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
          // Submit the form
          this.submit();
        }
      });
    });
  });

  // Listen to click event on delete button
  document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      // Trigger the form submit event
      this.closest('form').dispatchEvent(new Event('submit'));
    });
  });
</script> -->


<script>
  document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('click', function(e) {
      e.preventDefault();
      const url = this.getAttribute('href');
      Swal.fire({
        title: "Peringatan",
        text: "Ketika album di hapus, semua unggahan di dalamnya akan terhapus.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        cancelButtonText: "Batal",
        confirmButtonText: "Iya, hapus"
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirect to the delete URL
          window.location.href = url;
        }
      });
    });
  });
</script>




@endsection