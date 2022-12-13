<!-- Main Content -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pengungsi Masuk</h3>
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

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
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
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <?php $i = 0 ?>
                                @foreach ($data as $pengungsi)
                                    @if($pengungsi->statPos == 1)
                                    <?php $i++?>
                                    <td>{{ $i  }}</td>
                                    <td>{{ $pengungsi->nama }}</td>
                                    <td>{{ $pengungsi->namaKepala}}</td>
                                    <td>{{ $pengungsi->telpon }}</td>
                                    <td>{{ $pengungsi->lokasi }}</td>
                                    <td>
                                        <?php
                                            $gender =  $pengungsi->gender ;
                                            if($gender == 0){
                                                echo "Perempuan";
                                            }else if($gender == 1){
                                                echo "Laki-laki";
                                            }
                                            ?>
                                    </td>
                                    <td>{{ $pengungsi->umur }}</td>
                                    <td>{{ $pengungsi->tglMasuk }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pengungsi Keluar</h3>
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

                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
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
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <?php $j=0 ?>
                                @foreach ($data as $keys => $pengungsi)
                                    @if($pengungsi->statPos == 0)
                                    <?php $j++?>
                                    <td>{{ $j }}</td>
                                    <td>{{ $pengungsi->nama }}</td>
                                    <td>{{ $pengungsi->namaKepala}}</td>
                                    <td>{{ $pengungsi->telpon }}</td>
                                    <td>{{ $pengungsi->lokasi }}</td>
                                    <td>
                                        <?php
                                            $gender =  $pengungsi->gender ;
                                            if($gender == 0){
                                                echo "Perempuan";
                                            }else if($gender == 1){
                                                echo "Laki-laki";
                                            }
                                            ?>
                                    </td>
                                    <td>{{ $pengungsi->umur }}</td>
                                    <td>{{ $pengungsi->tglMasuk }}</td>

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
                                @endif
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