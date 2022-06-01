@extends('dashboard.layouts.main')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h4 mb-3 text-gray-800">Welcome back, {{ auth()->user()->name }}</h1>

    <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 inline-flex">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pengaduan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="pengaduan" value="{{ $pengaduan }}">{{ $pengaduan }} laporan</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 inline-flex">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Aspirasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="aspirasi" value="{{ $aspirasi }}">{{ $aspirasi }} laporan</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 inline-flex">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Permintaan Informasi
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="permintaanInformasi" value="{{ $permintaanInformasi }}">{{ $permintaanInformasi }} laporan</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @can('admin')
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Laporan Anonim</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $anonim }} laporan</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a
                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                        constantly updated collection of beautiful svg images that you can use
                        completely free and without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                        unDraw &rarr;</a>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-6 col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Total {{ $totalLaporan }} Laporan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Pengaduan
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Aspirasi
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Permintaan Informasi
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/vendor/chart.js/Chart.min.js"></script>
<script src="/js/demo/chart-pie-demo.js"></script>
<!-- /.container-fluid -->   
@endsection