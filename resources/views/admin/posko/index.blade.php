@extends('admin.mainIndex')
@section('content')

<!-- Main Content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Posko</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="/bencana">Bencana</a></li>
                    <li class="breadcrumb-item active">Posko</li>
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
                                    <h4 class="modal-title">Tambah Posko</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form action="{{ route('posko.create') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputNama">Nama Posko</label>
                                                <input type="text" class="form-control" id="exampleInputnama" name="nama" placeholder="Masukan nama posko" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputProvinsi">Provinsi</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan provinsi" name="provinsi" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputKota">Kota</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan kota" name="kota" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputKec">Kecamatan</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan kecamatan" name="kecamatan" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputKel">Kelurahan</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan kelurahan" name="kelurahan" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputDetail">Detail</label>
                                                <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan detail" name="detail" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="trc">TRC</label>
                                                <select class="form-control" id="trc_id" name="trc_id" required>
                                                    <option selected value="" hidden>Pilih TRC</option>
                                                    @foreach ($getTrc as $trc)
                                                    <option value="{{ $trc->idAdmin }}">{{ $trc->fullName }}</option>
                                                    <!-- <option value="0">Selesai</option> -->
                                                    @endforeach
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

                    <div class="container mt-3">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>

                    <div class="card-body ">
                        <a href="#" class="btn btn-success mb-2 " data-toggle="modal" data-target="#modal-default" style="font-size: 14px;">
                            <i class="fas fa-plus mr-1"></i> Tambah Posko
                        </a>

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
                                @foreach($data as $key => $posko)
                                <tr>
                                    <td>{{ $data->firstItem() + $key  }}</td>
                                    <td>{{ $posko->nama }}</td>
                                    <td>{{ $posko->lokasi}}</td>
                                    <td>{{ $posko->fullName}}</td>
                                    <td>23 orang</td>
                                    <td>{{ $posko->created_at}}</td>
                                    <td>{{ $posko->updated_at}}</td>
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
                                                <a href="#" class="dropdown-item " title="Edit Pengungsi" data-toggle="modal" data-target="#modal-edit-{{$posko->idPosko}}">
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
                                        <a href="#" class="btn btn-danger btn-sm" title="Hapus Posko">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach ($data as $detail)
                                <div class="modal fade" id="modal-edit-{{$detail->idPosko}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ubah Posko</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- form start -->
                                                <form action="{{ url('posko/edit/'.$detail->idPosko) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputNama">Nama Posko</label>
                                                            <input type="text" class="form-control" id="exampleInputnama" name="nama" placeholder="Masukan nama posko" value="{{$detail->nama}}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputProvinsi">Provinsi</label>
                                                            <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan provinsi" name="provinsi" value="{{$detail->provinsi}}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputKota">Kota</label>
                                                            <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan kota" name="kota" value="{{$detail->kota}}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputKec">Kecamatan</label>
                                                            <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan kecamatan" name="kecamatan" value="{{$detail->kecamatan}}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputKel">Kelurahan</label>
                                                            <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan kelurahan" name="kelurahan" value="{{$detail->kelurahan}}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputDetail">Detail</label>
                                                            <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan detail" name="detail" value="{{$detail->detail}}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="trc">TRC</label>
                                                            <select class="form-control" id="trc" name="trc_id" required>
                                                                <option selected value="{{ $detail->idAdmin }}" hidden>{{ $detail->fullName }}</option>
                                                                @foreach ($getTrc as $trc)
                                                                <option value="{{ $trc->idAdmin }}">{{ $trc->fullName }}
                                                                </option>
                                                                <!-- <option value="0">Selesai</option> -->
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Perbarui</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
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