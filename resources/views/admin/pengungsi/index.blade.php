@extends('admin.mainIndex')
@section('content')

<!-- Main Content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengungsi Posko (Nama Posko)</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">Bencana</a></li>
                    <li class="breadcrumb-item active"><a href="#">Posko</a></li>
                    <li class="breadcrumb-item active">Pengungsi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header justify-content-between">
                        <h3 class="card-title">List Posko</h3>
                        <div class="float-sm-right">
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                <h3 class="card-title"><i class="fas fa-plus"></i> Tambah Posko</h3>
                            </a>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Default Modal</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputNama">Nama Posko</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Nama Bencana">
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputPosko">Lokasi</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Total Posko">
                                            </div>

                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body ">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Lokasi</th>
                                    <th>TRC</th>
                                    <th>Pengungsi</th>
                                    <th>Waktu Dibuat</th>
                                    <th>Waktu Update</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Other browsers</td>
                                    <td>All others</td>
                                    <td>All others</td>
                                    <td>All others</td>
                                    <td>All others</td>
                                    <td>All others</td>
                                    <td>
                                        <a href="#" class="btn btn-primary mt-1" title="Tampil Pengungsi">
                                            Pengungsi
                                        </a>
                                        <a href="#" class="btn btn-warning mt-1" title="Edit Bencana" style="color: #fff;">
                                            Edit
                                        </a>
                                        <a href="#" class="btn btn-danger mt-1" title="Hapus Bencana">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection()