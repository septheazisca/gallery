@extends('dashboard.layout.main')

@section('sidebar')
@include('dashboard.layout.sidebar')
@endsection

@section('content')
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
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKategori" data-bs-target="#staticBackdrop">Tambah Kategori</button>
              <p class="mb-0">Tambah, lihat dan edit data seputar kategori unggahan.</p>
            </div>
            <hr>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>
                    <b>N</b>ame
                  </th>
                  <th>Ext.</th>
                  <th>City</th>
                  <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                  <th>Completion</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Chaim Waller</td>
                  <td>4240</td>
                  <td>North Shore</td>
                  <td>2010/25/07</td>
                  <td>25%</td>
                </tr>
                <tr>
                  <td>Berk Johnston</td>
                  <td>4532</td>
                  <td>Vergnies</td>
                  <td>2016/23/02</td>
                  <td>93%</td>
                </tr>
                <tr>
                  <td>Tad Munoz</td>
                  <td>2902</td>
                  <td>Saint-Nazaire</td>
                  <td>2010/09/05</td>
                  <td>65%</td>
                </tr>
                <tr>
                  <td>Vivien Dominguez</td>
                  <td>5653</td>
                  <td>Bargagli</td>
                  <td>2001/09/01</td>
                  <td>86%</td>
                </tr>
                <tr>
                  <td>Carissa Lara</td>
                  <td>3241</td>
                  <td>Sherborne</td>
                  <td>2015/07/12</td>
                  <td>72%</td>
                </tr>
                <tr>
                  <td>Hammett Gordon</td>
                  <td>8101</td>
                  <td>Wah</td>
                  <td>1998/06/09</td>
                  <td>20%</td>
                </tr>
                <tr>
                  <td>Walker Nixon</td>
                  <td>6901</td>
                  <td>Metz</td>
                  <td>2011/12/11</td>
                  <td>41%</td>
                </tr>
                <tr>
                  <td>Nathan Espinoza</td>
                  <td>5956</td>
                  <td>Strathcona County</td>
                  <td>2002/25/01</td>
                  <td>47%</td>
                </tr>
                <tr>
                  <td>Kelly Cameron</td>
                  <td>4836</td>
                  <td>Fontaine-Valmont</td>
                  <td>1999/02/07</td>
                  <td>24%</td>
                </tr>
                <tr>
                  <td>Kyra Moses</td>
                  <td>3796</td>
                  <td>Quenast</td>
                  <td>1998/07/07</td>
                  <td>68%</td>
                </tr>
                <tr>
                  <td>Grace Bishop</td>
                  <td>8340</td>
                  <td>Rodez</td>
                  <td>2012/02/10</td>
                  <td>4%</td>
                </tr>
                <tr>
                  <td>Zelenia Roman</td>
                  <td>7516</td>
                  <td>Redwater</td>
                  <td>2012/03/03</td>
                  <td>31%</td>
                </tr>
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
                    <form>
                      <div class="mb-3">
                        <label for="thumbnail" class="col-form-label">Thumbnail Kategori:</label>
                        <input type="file" class="form-control" accept=".png, .jpg, .jpeg, .mp4, .avi" id="thumbnail">
                      </div>
                      <div class="mb-3">
                        <label for="judul" class="col-form-label">Judul Kategori:</label>
                        <input type="text" class="form-control" id="judul">
                      </div>
                      <div class="mb-3">
                        <label for="detail" class="col-form-label">Detail Kategori:</label>
                        <textarea class="form-control" id="detail"></textarea>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Datal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection