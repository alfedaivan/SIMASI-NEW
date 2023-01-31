@extends('admin.mainIndex')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row d-flex justify-cotent-center">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Bencana</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form action="{{ route('bencana.store') }}" method="post">
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

                                <!-- <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="form-radio-inline d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio1">
                                            <label class="form-check-label">Berjalan</label>
                                        </div>
                                        <div class="form-check ml-3">
                                            <input class="form-check-input" type="radio" name="radio1">
                                            <label class="form-check-label">Selesai</label>
                                        </div>
                                    </div>
                                </div> -->



                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection()