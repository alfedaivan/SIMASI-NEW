@extends('admin.mainIndex')
@section('content')

<!-- Main Content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Bencana</h1>
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

            <!-- Tambah bencana -->
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
                            <form action="{{ route('bencana.create') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputNama">Nama Bencana</label>
                                        <input type="text" class="form-control" id="exampleInputnama" name="namaBencana" placeholder="Masukan nama bencana" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPosko">Tanggal</label>
                                        <input type="date" class="form-control" id="exampleInputnama" placeholder="Masukan tanggal" name="tanggal" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPengungsi">Waktu</label>
                                        <input type="time" class="form-control" id="exampleInputnama" placeholder="Masukan waktu" name="waktu" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputKorban">Lokasi</label>
                                        <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan lokasi" name="lokasi" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option selected value="" hidden>Pilih status</option>
                                            <option value="1">Berjalan</option>
                                            <option value="0">Selesai</option>
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
                            <!-- <th>Pengungsi</th> -->
                            <th>Waktu Update</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $key => $bencana)
                        <tr>
                            <td>{{ $data->firstItem() + $key }}</td>
                            <td>{{ $bencana->namaBencana }}</td>
                            <td>{{ $bencana->waktu }}</td>
                            <td>{{ $bencana->lokasi }}</td>
                            <!-- <td>{{ $bencana->posko }}</td> -->
                            <td>{{ $bencana->ttlPosko }} tempat</br>
                                <a href="{{url('/listPosko')}}/<?php echo $bencana->idBencana; ?>" class="btn btn-primary btn-xs" title="Lihat posko"><i class="fas fa-eye"></i> Posko </a>
                            </td>
                            <!-- @foreach ($data2 as $bencana2) -->

                            <!-- <td>{{  $bencana->ttlPengungsi }} orang</td> -->

                            <!-- @endforeach -->
                            <td>{{ $bencana->waktuUpdate }}</td>
                            <!-- <td>All others</td> -->
                            <td>
                                @if($bencana->status == 1)
                                @php
                                $value = 'Berjalan'
                                @endphp
                                <span class="badge badge-success"><?php echo $value; ?></span>
                                @else
                                @php
                                $value = 'Selesai'
                                @endphp
                                <span class="badge badge-danger">Selesai</span>
                                @endif
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
                                        <a href="#" class="dropdown-item " title="Edit Bencana" data-toggle="modal" data-target="#modal-edit-{{$bencana->idBencana}}">
                                            <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                            </svg>
                                            Edit
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item " title="Hapus Pengungsi" onclick="deleteConfirmation({{$bencana->idBencana}})">
                                            <i class="fas fa-trash mr-1"></i> Hapus
                                        </a>
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- <a href="#" class="btn btn-danger btn-sm" title="Hapus Pengungsi">
                                            Hapus
                                        </a> -->
                            </td>
                            @endforeach
                        </tr>

                        @foreach ($data as $detail)
                        <div class="modal fade" id="modal-edit-{{$detail->idBencana}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Ubah Bencana</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/bencana/edit/'.$detail->idBencana) }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputNama">Nama Bencana</label>
                                                    <input type="text" class="form-control" id="exampleInputnama" name="namaBencana" placeholder="Masukan nama bencana" value="{{$detail->namaBencana}}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPosko">Tanggal</label>
                                                    <input type="date" class="form-control" id="exampleInputnama" placeholder="Masukan tanggal" name="tanggal" value="{{$detail->tgl}}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPengungsi">Waktu</label>
                                                    <input type="time" class="form-control" id="exampleInputnama" placeholder="Masukan waktu" name="waktu" value="{{$detail->time}}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputKorban">Lokasi</label>
                                                    <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan lokasi" name="lokasi" value="{{$detail->lokasi}}" required>
                                                </div>

                                                <?php
                                                $value = $detail->status;
                                                if ($value == 1) {
                                                    $value = 'Berjalan';
                                                } else if ($value == 0) {
                                                    $value = 'Selesai';
                                                }

                                                ?>

                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" id="status" name="status" required>
                                                        <option selected value="{{$detail->status}}" hidden>
                                                            <?php echo $value;  ?></option>
                                                        <option value="1">Berjalan</option>
                                                        <option value="0">Selesai</option>
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

    <script type="text/javascript">
        function deleteConfirmation(id) {
            swal.fire({
                title: "Hapus?",
                icon: 'question',
                text: "Apakah Anda yakin?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Iya, hapus!",
                cancelButtonText: "Batal!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{url('bencana/delete')}}/" + id,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            if (results.success === true) {
                                swal.fire("Berhasil!", results.message, "success");
                                // refresh page after 2 seconds
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
                                swal.fire("Gagal!", results.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            })
        }
    </script>

</section>


@endsection()