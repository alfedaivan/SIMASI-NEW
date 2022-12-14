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
                    <li class="breadcrumb-item active"><a href="/bencana">Bencana</a></li>
                    <li class="breadcrumb-item active"><a href="{{ url()->previous() }}">Posko</a></li>
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
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Nama Pengungsi">
                                            </div>

                                            <div class="form-group">
                                                <label for="sKeluarga">Status Keluarga</label>
                                                <select class="form-control" id="sKeluarga" onchange="showDiv(this)">
                                                    <option value="form_1" selected>Anggota Keluarga</option>
                                                    <option value="form_2">Kepala Keluarga</option>
                                                </select>
                                            </div>

                                            <!-- script form status keluarga -->
                                            <script type="text/javascript">
                                                var idForm_1 = document.getElementById('form_1');
                                                var idForm_2 = document.getElementById('form_2')

                                                function showDiv(select) {
                                                    console.log(select);
                                                    if (select.value == 'form_1') {
                                                        idForm_1.style.display = "block";
                                                        idForm_2.style.display = "none";
                                                    } else {
                                                        idForm_1.style.display = "none";
                                                        idForm_2.style.display = "block";
                                                    }
                                                }
                                            </script>
                                            <!-- end -->

                                            <!-- jika pengungsi kepala keluarga sudah ditambahkan -->
                                            <div class="form-group" class="hidden" id="form_1">
                                                <label for="exampleInputNama">Kepala Keluarga</label>
                                                <select class="form-control" id="trc" name="trc_id" required>
                                                    <option>Bejo</option>
                                                    <option>Paijo</option>
                                                </select>
                                            </div>

                                            <!-- jika belum perlu menambahkan alamat -->
                                            <div class="wrapper-kk" class="hidden" id="form_2" style="display:none;">
                                                <div class="form-group">
                                                    <label for="exampleInputPosko">RT/RW</label>
                                                    <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan RT/RW">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPosko">Desa</label>
                                                    <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Desa">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPosko">Kecamatan</label>
                                                    <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Kecamatan">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPosko">Alamat</label>
                                                    <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Alamat">
                                                </div>
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
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan Umur">
                                            </div>

                                            <div class="form-group">
                                                <label for="trc">Kondisi</label>
                                                <select class="form-control" id="trc" name="trc_id" required>
                                                    <option>Sehat</option>
                                                    <option>Luka Ringan</option>
                                                    <option>Luka Sedang</option>
                                                    <option>Luka Berat</option>
                                                </select>
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
                                    <th>Kondisi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($data as $key => $pengungsi)
                                    <td>{{ $data->firstItem() + $key  }}</td>
                                    <td>{{ $pengungsi->nama }}</td>
                                    <td>{{ $pengungsi->namaKepala}}</td>
                                    <td>{{ $pengungsi->telpon }}</td>
                                    <td>{{ $pengungsi->lokasi }}</td>
                                    <td>
                                        <?php
                                        $gender =  $pengungsi->gender;
                                        if ($gender == 0) {
                                            echo "Perempuan";
                                        } else if ($gender == 1) {
                                            echo "Laki-laki";
                                        }
                                        ?>
                                    </td>
                                    <td>{{ $pengungsi->umur }}</td>
                                    <td>
                                        <?php
                                        $kondisi =  $pengungsi->statKon;
                                        if ($kondisi == 0) {
                                            echo "Luka Ringan";
                                        } else if ($kondisi == 1) {
                                            echo "Luka Sedang";
                                        } else if ($kondisi == 2) {
                                            echo "Luka Berat";
                                        } else if ($kondisi == 3) {
                                            echo "Sehat";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $statPos =  $pengungsi->statPos;
                                        if ($statPos == 0) {
                                            echo "<span class='badge badge-danger'>Keluar</span>";
                                        } else if ($statPos == 1) {
                                            echo "<span class='badge badge-success'>Di Posko</span>";
                                        }
                                        ?>
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
                                @endforeach
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