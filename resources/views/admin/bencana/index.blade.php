@extends('admin.mainIndex')
@section('content')

<!-- Main Content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Bencana</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Bencana</li>
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
                        <h3 class="card-title">List Bencana</h3>
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

                    <!-- tambah bencana -->
                    <div class="modal fade" id="tambah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Bencana</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputNama">Nama Bencana</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Nama Bencana">
                                            </div>

                                            <div class="form-group">
                                                <label>Waktu Kejadian</label>
                                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Textarea</label>
                                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputPosko">Total Posko</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Total Posko">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPengungsi">Total Pengungsi</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Total Pengungsi">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputKorban">Total Korban</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Total Korban">
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
                    <div class="card-body table-responsive">
                        <a href="#" class="btn btn-success mb-2 " data-toggle="modal" data-target="#tambah" style="font-size: 14px;">
                            <i class="fas fa-plus mr-1"></i> Tambah Bencana
                        </a>

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Waktu</th>
                                    <th>Lokasi</th>
                                    <th>Posko</th>
                                    <th>Pengungsi</th>
                                    <th>Korban</th>
                                    <th>Waktu Update</th>
                                    <th>Status</th>
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
                                    <td>All others</td>
                                    <td>
                                        <!-- pakai if else -->
                                        <span class="badge badge-success">Berjalan</span>
                                        <!-- <span class="badge badge-danger">Selesai</span> -->
                                    </td>
                                    <td>
                                        <a href="{{url('/posko')}}" class="btn btn-primary btn-sm" title="Tampil Posko">
                                            Posko
                                        </a>
                                        <a href="#edit" class="btn btn-warning btn-sm" title="Edit Bencana" data-toggle="modal" data-target="#edit" style="color:#fff;">
                                            Edit
                                        </a>
                                        <div class="modal fade" id="edit">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Tambah Bencana</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->
                                                        <form>
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="exampleInputNama">Nama Bencana</label>
                                                                    <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Nama Bencana">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Waktu Kejadian</label>
                                                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                                                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Textarea</label>
                                                                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="exampleInputPosko">Total Posko</label>
                                                                    <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Total Posko">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputPengungsi">Total Pengungsi</label>
                                                                    <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Total Pengungsi">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputKorban">Total Korban</label>
                                                                    <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Total Korban">
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
                                        <a href="#" class="btn btn-danger btn-sm" title="Hapus Pengungsi">
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