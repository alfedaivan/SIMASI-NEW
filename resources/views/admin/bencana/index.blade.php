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
                                                <label for="exampleInputNama">Nama Bencana</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Nama Bencana">
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
                            @foreach ($data as $key => $bencana)
                                <tr>
                                    <td>{{ $data->firstItem() + $key }}</td>
                                    <td>{{ $bencana->nama }}</td>
                                    <td>{{ $bencana->waktu }}</td>
                                    <td>{{ $bencana->lokasi }}</td>
                                    <td>{{ $bencana->posko }}</td>
                                    <td>{{ $bencana->pengungsi }}</td>
                                    <td>{{ $bencana->pengungsi }}</td>
                                    <td>{{ $bencana->waktuUpdate }}</td>
                                    <!-- <td>All others</td> -->
                                    <td>
                                        <?php
                                            $value = $bencana->status;
                                            if($value == 1){
                                                $value = 'Berjalan';
                                            }else if($value == 0){
                                                $value = 'Selesai';
                                            }
                                            // if()
                                        ?>
                                        <!-- pakai if else -->
                                        <span class="badge badge-success"><?php echo $value;?></span>
                                        <!-- <span class="badge badge-danger">Selesai</span> -->
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
                                                <a href="#" class="dropdown-item " title="Edit Pengungsi">
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
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br />
                        {{ $data->links() }}
                        <br />
                    </div>

                    
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection()