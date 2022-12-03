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
                        <div class="float-sm-right">
                            <a href="#" class="btn btn-success">
                                <h3 class="card-title"><i class="fas fa-plus"></i> Tambah Bencana</h3>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Waktu</th>
                                    <th>Lokasi</th>
                                    <th>Total Posko</th>
                                    <th>Total Pengungsi</th>
                                    <th>Total Korban</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Other browsers</td>
                                    <td>All others</td>
                                    <td>All others</td>
                                    <td>All others</td>
                                    <td>All others</td>
                                    <td>All others</td>
                                    <td>All others</td>
                                    <td>
                                        <a href="#" class="btn btn-primary" title="Tampil Posko">
                                            <i class="fas fa-home"></i>
                                        </a>
                                        <a href="#" class="btn btn-warning" title="Edit Bencana" style="width: 44px;">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                <path fill="#fff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                            </svg>

                                        </a>
                                        <a href="#" class="btn btn-danger" title="Hapus Bencana">
                                            <i class="fas fa-trash"></i>
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