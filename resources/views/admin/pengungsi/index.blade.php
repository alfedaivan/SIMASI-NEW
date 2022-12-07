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

@include('admin.pengungsi.statistikPengungsi')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Pengungsi</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
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
                        <a href="#" class="btn btn-success mb-2 " data-toggle="modal" data-target="#modal-default" style="font-size: 14px;">
                            <i class="fas fa-plus mr-1"></i> Tambah Pengungsi
                        </a>

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kepala Keluarga</th>
                                    <th>No Telepon</th>
                                    <th>RT/RW</th>
                                    <th>Desa</th>
                                    <th>Kecamatan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Bejo</td>
                                    <td>Bejo Senior</td>
                                    <td>081234567891</td>
                                    <td>01/02</td>
                                    <td>Bululawang</td>
                                    <td>Malang</td>
                                    <td>Laki-Laki</td>
                                    <td>30</td>
                                    <td>
                                        <!-- pakai if else -->
                                        <span class="badge badge-success">Di Posko</span>
                                        <!-- <span class="badge badge-danger">Keluar</span> -->
                                    </td>
                                    <td>

                                        <a href="#edit" class="btn btn-warning btn-xs" title="Edit Posko" data-toggle="modal" data-target="#edit" style="color:#fff;">
                                            Edit
                                        </a>

                                        <div class="modal fade" id="edit">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Posko</h4>
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

                                                                <div class="form-group">
                                                                    <label for="exampleSelectBorder">Pilih TRC</label>
                                                                    <select class="custom-select form-control-border" id="exampleSelectBorder">
                                                                        <option>Value 1</option>
                                                                        <option>Value 2</option>
                                                                        <option>Value 3</option>
                                                                    </select>
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

                                        <a href="#" class="btn btn-danger btn-xs" title="Hapus Pengungsi">
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