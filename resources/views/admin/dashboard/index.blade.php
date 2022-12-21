@extends('admin.mainIndex')
@section('content')
<!-- Main Content -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>1000</h3>
                        <p>Total Pusdalop</p>
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
                        <h3 style="color: #ffff;">1000</h3>
                        <p style="color: #ffff;">Total TRC</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-lansia" style="color: #ffff !important;">Tampil Detail <i class="fas fa-arrow-circle-right" style="color: #ffff;"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>1000</h3>
                        <p>Total Bencana Berjalan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fire"></i>
                    </div>
                    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-bayi">Tampil Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>1000</h3>
                        <p>Total Bencana Selesai</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fire"></i>
                    </div>
                    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-sakit">Tampil Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>




            <!-- ./col -->
        </div>
    </div>
</section>

@endsection()