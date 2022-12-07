@extends('admin.mainIndex')
@section('content')

<!-- Main Content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Member</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Member</li>
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
                        <h3 class="card-title">List Member</h3>
                        <div class="float-sm-right">
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                <h3 class="card-title"><i class="fas fa-plus"></i> Tambah Member</h3>
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
                                                <input type="text" class="form-control" id="namaDepan"
                                                    placeholder="Masukan nama depan" name="namaDepan" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="namaBelakang">Nama belakang</label>
                                                <input type="text" class="form-control" id="namaBelakang"
                                                    placeholder="Masukan nama belakang" name="namaBelakang" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Masukan email" name="email" required>

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
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
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
                                @foreach ($data as $member)

                                <tr>
                                    <td>{{$member->fullName}}</td>
                                    <td>{{$member->email}}</td>
                                    <td>{{$member->namaPeran}}</td>
                                    <!-- <td>All others</td> -->
                                    <!-- <td>All others</td> -->
                                    <!-- <td>All others</td>
                                    <td>All others</td> -->
                                    <td>
                                        <!-- <a href="#" class="btn btn-primary" title="Tampil Posko">
                                            <i class="fas fa-home"></i>
                                        </a> -->
                                        <a href="#" class="btn btn-warning" title="Edit Bencana" style="width: 44px;"
                                            data-toggle="modal" data-target="#modal-edit-{{$member->idAdmin}}">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                <path fill="#fff"
                                                    d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                            </svg>

                                        </a>
                                        <a href="#" class="btn btn-danger" title="Hapus Bencana">
                                            <i class="fas fa-trash"></i>
                                        </a>
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
                                    <form action="{{ url('/edit/'.$detail->idAdmin) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                            <div class="form-group">
                                                <label for="namaDepan">Nama depan</label>
                                                <input type="text" class="form-control" id="namaDepan"
                                                    placeholder="Masukan nama depan" name="namaDepan" value="{{ $detail->firstname }}"  required>
                                            </div>

                                            <div class="form-group">
                                                <label for="namaBelakang">Nama belakang</label>
                                                <input type="text" class="form-control" id="namaBelakang"
                                                    placeholder="Masukan nama belakang" name="namaBelakang"  value="{{ $detail->lastname }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Masukan email" name="email"  value="{{ $detail->email }}" required>

                                            </div>

                                            <div class="form-group">
                                                <label for="position-option">Peran</label>
                                                <select class="form-control" id="peran" name="peran" required>
                                                <option selected disabled hidden value="{{$detail->idRole}}">
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

    <script>
    function checkEmail() {

        jQuery.ajax({
            url: "check_availability.php",
            data: 'username=' + $("#username").val(),
            type: "POST",
            success: function(data) {
                $("#check-username").html(data);
            },
            error: function() {}
        });
    }
    </script>

</section>

@endsection()