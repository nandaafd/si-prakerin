@extends('layout.main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard v2</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->

      {{-- Table --}}
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Bridgeing List</h3>
        </div>
        {{-- Conten --}}
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>1</td>
                    <td>Generate DBF Data Siswa</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam cupiditate unde, repudiandae possimus ut quos similique saepe officia quaerat tenetur.</td>
                    <td>
                      <a href="/generate_siswa" class="btn btn-app bg-success">
                        <i class="fas fa-sync"></i> Generate
                      </a>
                    </td>
                </tr>
              </tbody>
            </table>
        </div>
        {{-- End Conten --}}


      </div>
      {{-- End Table --}}

      {{-- Tes get data --}}
      {{-- <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Tes</h3>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Nama</th>
                <th>NIS</th>
                <th style="width: 40px">Alamat</th>
                <th>No Telp</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($get_siswa as $row)
              <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->nama_siswa }}</td>
                <td>{{ $row->nis }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->no_telp }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div> --}}
      {{-- End Tes get data --}}
    </section>
@endsection