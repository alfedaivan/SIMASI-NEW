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
                           
                                @foreach ($data as $pengungsi)
                                    @if($pengungsi->statPos == 1)
                                    <td> {{($data->currentPage() - 1) * $data->perPage() + $loop->iteration}}</td>
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
                        <br />
                        {{ $data->links() }}
                        <br />
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
                                @foreach ($datas as $keys => $pengungsis)
                                    @if($pengungsis->statPos == 0)
                                    <td>{{ ($datas->currentPage() - 1)  * $datas->links()->paginator->perPage() + $loop->iteration }}</td>
                                    <td>{{ $pengungsis->nama }}</td>
                                    <td>{{ $pengungsis->namaKepala}}</td>
                                    <td>{{ $pengungsis->telpon }}</td>
                                    <td>{{ $pengungsis->lokasi }}</td>
                                    <td>
                                        <?php
                                            $gender =  $pengungsis->gender ;
                                            if($gender == 0){
                                                echo "Perempuan";
                                            }else if($gender == 1){
                                                echo "Laki-laki";
                                            }
                                            ?>
                                    </td>
                                    <td>{{ $pengungsis->umur }}</td>
                                    <td>{{ $pengungsis->tglMasuk }}</td>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <br />
                        {{ $datas->links() }}
                        <br />
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>