<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $jmlAnggota }}</h3>
                        <p>Total Pengungsi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-ttlpengungsi">Tampil
                        Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $ttlKpl }}</h3>
                        <p>Total Kepala Keluarga</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-kkeluarga">Tampil
                        Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 style="color: #ffff;">{{ $ttlBalita }}</h3>
                        <p style="color: #ffff;">Total Balita</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-baby"></i>
                    </div>
                    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-bayi" style="color: #ffff !important;">Tampil Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 style="color: #ffff;">{{ $ttlLansia }}</h3>
                        <p style="color: #ffff;">Total Lansia</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-wheelchair"></i>
                    </div>
                    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-lansia" style="color: #ffff !important;">Tampil Detail <i class="fas fa-arrow-circle-right" style="color: #ffff;"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 style="color: #ffff;">{{ $ttlDifabel }}</h3>
                        <p style="color: #ffff;">Total Difabel</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-blind"></i>
                    </div>
                    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-lansia" style="color: #ffff !important;">Tampil Detail <i class="fas fa-arrow-circle-right" style="color: #ffff;"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $ttlSakit }}</h3>
                        <p>Total Pengungsi Sakit</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-sakit" style="color: #ffff !important;">Tampil Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 style="color: #ffff;">{{ $getMasuk }}</h3>
                        <p style="color: #ffff;">Total Pengungsi di Posko</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-building "></i>
                    </div>
                    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-sakit" style="color: #ffff !important;">Tampil Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $getKeluar}}</h3>
                        <p>Total Pengungsi Keluar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-sakit">Tampil Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</section>

<!-- modal anggota keluarga -->
<div class="modal fade" id="modal-kkeluarga">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">List Kepala Keluarga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jumlah anggota</th>
                            <th>Alamat</th>
                            <!-- <th>Jenis Kelamin</th> -->
                            <!-- <th>Umur</th> -->
                            <!-- <th>Kondisi</th>
                            <th>Status</th> -->
                        </tr>
                    </thead>
                    <?php $k = 0; ?>
                    @foreach($dataKpl as $pengungsi)
                    <tr>
                        <?php $k++; ?>
                        <td>{{ $k }}</td>
                        <td>{{ $pengungsi->nama}}</td>
                        <td>{{ $jmlAnggota }}</td>
                        @foreach($getAlamat as $alamat)
                        <td>{{ $alamat->lokasi }}</td>
                        @endforeach
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end -->

<!-- modal kepala keluarga -->
<div class="modal fade" id="modal-kkeluarga">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">List Kepala Keluarga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jumlah anggota</th>
                            <th>Alamat</th>
                            <!-- <th>Jenis Kelamin</th> -->
                            <!-- <th>Umur</th> -->
                            <!-- <th>Kondisi</th>
                            <th>Status</th> -->
                        </tr>
                    </thead>
                    <?php $k = 0; ?>
                    @foreach($dataKpl as $pengungsi)
                    <tr>
                        <?php $k++; ?>
                        <td>{{ $k }}</td>
                        <td>{{ $pengungsi->nama}}</td>
                        <td>{{ $jmlAnggota }}</td>
                        @foreach($getAlamat as $alamat)
                        <td>{{ $alamat->lokasi }}</td>
                        @endforeach
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end -->

<!-- modal bayi -->
<div class="modal fade" id="modal-bayi">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">List Pengungsi Balita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kepala Keluarga</th>
                        <!-- <th>No Telepon</th> -->
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Umur</th>
                        <th>Kondisi</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $l = 0; ?>
                        @foreach($data as $balita)
                        @if ($balita->umur < 5) <?php $l++; ?> <tr>
                            <td>{{ $l }}</td>
                            <td>{{ $balita->nama }}</td>
                            <td>{{ $balita->namaKepala }}</td>
                            <td>{{ $balita->lokasi }}</td>
                            <?php
                            $getGender = $pengungsi->gender;
                            if ($getGender == 0) {
                                $gender = "Perempuan";
                            } else if ($getGender == 1) {
                                $gender = "Laki-laki";
                            }
                            ?>
                            <td><?php echo $gender; ?></td>
                            <td>{{ $balita->umur }}</td>
                            <td>
                                <?php
                                $kondisi = $balita->statKon;
                                if ($kondisi == 0) {
                                    echo "Sehat";
                                } else if ($kondisi == 1) {
                                    echo "Luka Ringan";
                                } else if ($kondisi == 2) {
                                    echo "Luka Sedang";
                                } else if ($kondisi == 3) {
                                    echo "Luka Berat";
                                } else if ($kondisi == 4) {
                                    echo "Difabel";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $statPos = $balita->statPos;
                                if ($statPos == 0) {
                                    echo "<span class='badge badge-danger'>Keluar</span>";
                                } else if ($statPos == 1) {
                                    echo "<span class='badge badge-success'>Di Posko</span>";
                                }
                                ?>
                            </td>
                            </tr>

                            @endif
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end -->

<!-- modal bayi -->
<div class="modal fade" id="modal-lansia">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">List Pengungsi Lansia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
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
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $m = 0; ?>
                        @foreach($data as $lansia)
                        @if ($lansia->umur > 60)
                        <?php $m++; ?>
                        <tr>
                            <td>{{ $m }}</td>
                            <td>{{ $lansia->nama }}</td>
                            <td>{{ $lansia->namaKepala }}</td>
                            <td>{{ $lansia->telpon }}</td>
                            <td>{{ $lansia->lokasi }}</td>
                            <?php
                            $getGender = $lansia->gender;
                            if ($getGender == 0) {
                                $gender = "Perempuan";
                            } else if ($getGender == 1) {
                                $gender = "Laki-laki";
                            }
                            ?>
                            <td><?php echo $gender; ?></td>
                            <td>{{ $lansia->umur }}</td>
                            <td>
                                <?php
                                $kondisi = $lansia->statKon;
                                if ($kondisi == 0) {
                                    echo "Sehat";
                                } else if ($kondisi == 1) {
                                    echo "Luka Ringan";
                                } else if ($kondisi == 2) {
                                    echo "Luka Sedang";
                                } else if ($kondisi == 3) {
                                    echo "Luka Berat";
                                } else if ($kondisi == 4) {
                                    echo "Difabel";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $statPos = $lansia->statPos;
                                if ($statPos == 0) {
                                    echo "<span class='badge badge-danger'>Keluar</span>";
                                } else if ($statPos == 1) {
                                    echo "<span class='badge badge-success'>Di Posko</span>";
                                }
                                ?>
                            </td>
                        </tr>

                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end -->

<!-- modal sakit -->
<div class="modal fade" id="modal-sakit">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">List Kondisi Sakit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
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
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 0; ?>
                        @foreach($data as $sakit)
                        @if ($sakit->statKon > 0)
                        <?php $n++; ?>
                        <tr>
                            <td>{{ $n }}</td>
                            <td>{{ $sakit->nama }}</td>
                            <td>{{ $sakit->namaKepala }}</td>
                            <td>{{ $sakit->telpon }}</td>
                            <td>{{ $sakit->lokasi }}</td>
                            <?php
                            $getGender = $sakit->gender;
                            if ($getGender == 0) {
                                $gender = "Perempuan";
                            } else if ($getGender == 1) {
                                $gender = "Laki-laki";
                            }
                            ?>
                            <td><?php echo $gender; ?></td>
                            <td>{{ $sakit->umur }}</td>
                            <td>
                                <?php
                                $kondisi = $sakit->statKon;
                                if ($kondisi == 0) {
                                    echo "Sehat";
                                } else if ($kondisi == 1) {
                                    echo "Luka Ringan";
                                } else if ($kondisi == 2) {
                                    echo "Luka Sedang";
                                } else if ($kondisi == 3) {
                                    echo "Luka Berat";
                                } else if ($kondisi == 4) {
                                    echo "Difabel";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $statPos = $sakit->statPos;
                                if ($statPos == 0) {
                                    echo "<span class='badge badge-danger'>Keluar</span>";
                                } else if ($statPos == 1) {
                                    echo "<span class='badge badge-success'>Di Posko</span>";
                                }
                                ?>
                            </td>
                        </tr>

                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end -->