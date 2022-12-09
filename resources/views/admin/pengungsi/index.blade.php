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
                                    <h4 class="modal-title">Tambah Pengungsi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputNama">Nama Pengungsi</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Nama Bencana">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputNama">Kepala Keluarga</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Nama Bencana">
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputPosko">RT/RW</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Total Posko">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPosko">Desa</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Total Posko">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPosko">Kecamatan</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Total Posko">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPosko">Alamat</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Total Posko">
                                            </div>

                                            <div class="form-group">
                                                <label for="trc">Jenis Kelamin</label>
                                                <select class="form-control" id="trc" name="trc_id" required>
                                                    <option>Laki - Laki</option>
                                                    <option>Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPosko">Umur</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Total Posko">
                                            </div>

                                            <div class="form-group">
                                                <label for="trc">Status</label>
                                                <select class="form-control" id="trc" name="trc_id" required>
                                                    <option>Masuk</option>
                                                    <option>Keluar</option>
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
                                    <th>Alamat</th>
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
                                    <td>Malang</td>
                                    <td>Laki-Laki</td>
                                    <td>30</td>
                                    <td>
                                        <!-- pakai if else -->
                                        <span class="badge badge-success">Di Posko</span>
                                        <!-- <span class="badge badge-danger">Keluar</span> -->
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                                <i class="fas fa-bars"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-lg" role="menu">
                                                <!-- <a href="#" class="dropdown-item " data-toggle="modal" data-target="#modal-detail" title="Detail Pengungsi">
                                                    <i class="fas fa-eye mr-1"></i> Detail
                                                </a>
                                                <div class="dropdown-divider"></div> -->
                                                <a href="#" class="dropdown-item " title="Edit Bencana" data-toggle="modal" data-target="#modal-edit">
                                                    <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                    </svg>
                                                    Edit
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item " title="Hapus Pengungsi">
                                                    <i class="fas fa-trash mr-1"></i> Hapus
                                                </a>
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- <a href="#" class="btn btn-danger btn-sm" title="Hapus Pengungsi">
                                            Hapus
                                        </a> -->
                                    </td>

                                    <div class="modal fade" id="modal-edit">
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

@include('admin.pengungsi.logKeluarMasuk')

@endsection()