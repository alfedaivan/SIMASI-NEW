@extends('admin.mainIndex')
@section('content')

<!-- Main Content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Anggota</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Anggota</li>
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
                        <h3 class="card-title">List Anggota</h3>
                        <div class="float-sm-right">
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                <h3 class="card-title"><i class="fas fa-plus"></i> Tambah Anggota</h3>
                            </a>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Member</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form action="{{ route('member.create') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="namaDepan">Nama depan</label>
                                                <input type="text" class="form-control" id="namaDepan" placeholder="Masukan nama depan" name="namaDepan" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="namaBelakang">Nama belakang</label>
                                                <input type="text" class="form-control" id="namaBelakang" placeholder="Masukan nama belakang" name="namaBelakang" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" placeholder="Masukan email" name="email" required>

                                            </div>

                                            <div class="form-group">
                                                <label for="position-option">Peran</label>
                                                <select class="form-control" id="peran" name="peran" required>
                                                    @foreach ($role as $peran)
                                                    <option value="{{ $peran->id }}">{{ $peran->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary" id="button">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <div class="container mt-2">
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
                    <!-- /.card-header -->


                    <div class="card-body ">

                        <a href="#" class="btn btn-success mb-2" data-toggle="modal" data-target="#modal-default">
                            <h3 class="card-title"><i class="fas fa-plus"></i> Tambah Anggota</h3>
                        </a>

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Peran</th>
                                    <th>Aksi</th>
                                    <!-- <th>Total Posko</th>
                                    <th>Total Pengungsi</th>
                                    <th>Total Korban</th>
                                    <th>Status</th>
                                    <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $member)

                                <tr>
                                    <td>{{ $data->firstItem() + $key  }}</td>
                                    <td>{{$member->fullName}}</td>
                                    <td>{{$member->email}}</td>
                                    <td>{{$member->namaPeran}}</td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                                <i class="fas fa-bars"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-lg" role="menu" data-toggle="modal" data-target="#modal-edit-{{$member->idAdmin}}">
                                                <a href="#" class="dropdown-item " title="Edit Bencana" data-toggle="modal" data-target="#modal-edit">
                                                    <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                    </svg>
                                                    Edit
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item " title="Hapus Pengungsi" onclick="deleteConfirmation({{$member->idAdmin}})">
                                                    <i class="fas fa-trash mr-1"></i> Hapus
                                                </a>
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- <a href="#" class="btn btn-danger btn-sm" title="Hapus Pengungsi">
                                            Hapus
                                        </a> -->
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
                @foreach ($data as $detail)
                <div class="modal fade" id="modal-edit-{{ $detail->idAdmin }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Member</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- form start -->
                                <form action="{{ url('/member/edit/'.$detail->idAdmin) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="namaDepan">Nama depan</label>
                                            <input type="text" class="form-control" id="namaDepan" placeholder="Masukan nama depan" name="namaDepan" value="{{ $detail->firstname }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="namaBelakang">Nama belakang</label>
                                            <input type="text" class="form-control" id="namaBelakang" placeholder="Masukan nama belakang" name="namaBelakang" value="{{ $detail->lastname }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="namaBelakang">Nama belakang</label>
                                            <input type="text" class="form-control" id="namaBelakang" placeholder="Masukan nama belakang" name="namaBelakang" value="{{ $detail->lastname }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Masukan email" name="email" value="{{ $detail->email }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Masukan email" name="email" value="{{ $detail->email }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="position-option">Peran</label>
                                            <select class="form-control" id="peran" name="peran" required>
                                                <option selected value="{{ $detail->idRole }}" hidden>
                                                    {{ $detail->namaPeran }}
                                                </option>
                                                @foreach ($role as $peran)
                                                <option value="{{ $peran->id }}">{{ $peran->name }}
                                                </option>
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
            </div>
            @endforeach
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
                        url: "{{url('/delete')}}/" + id,
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