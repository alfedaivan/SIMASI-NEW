@extends('admin.mainIndex')
@section('content')

@foreach ($bencana as $bencana )
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
                        <form action="{{ route('bencana.update', $bencana->idBencana) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <input type="text" class="form-control" id="bencana_id" name="bencana_id" value="{{request()->user()->id}}" hidden required>
                                <div class="form-group">
                                    <label for="exampleInputNama">Nama Bencana</label>
                                    <input type="text" class="form-control" id="exampleInputnama" name="namaBencana" placeholder="Masukan nama bencana" value="{{$bencana ->namaBencana}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPosko">Tanggal</label>
                                    <input type="date" class="form-control" id="exampleInputnama" placeholder="Masukan tanggal" name="tanggal" value="{{$bencana ->tgl}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPengungsi">Waktu</label>
                                    <input type="time" class="form-control" id="exampleInputnama" placeholder="Masukan waktu" name="waktu" value="{{$bencana ->time}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputKorban">Lokasi</label>
                                    <input type="text" class="form-control" id="exampleInputnama" placeholder="Masukan lokasi" name="lokasi" value="{{$bencana ->lokasi}}" required>
                                </div>

                                <?php
                                $value = $bencana->status;
                                if ($value == 1) {
                                    $value = 'Berjalan';
                                } elseif ($value == 0) {
                                    $value = 'Selesai';
                                }
                                // if()
                                ?>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option selected value="{{$bencana ->status}}" hidden>
                                            <?php echo $value; ?>
                                        </option>
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
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endforeach

@endsection()