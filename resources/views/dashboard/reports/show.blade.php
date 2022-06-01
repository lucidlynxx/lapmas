@extends('dashboard.layouts.main')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center mb-3 justify-content-between">
            <div class="row">
                <div class="col">
                    <h1 class="h4 mb-0 text-gray-800">Detail Laporan</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @can('admin')
                    <a onclick="printPDF()" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan</a>
                    @livewire('show-alert', ['reportId' => $report->id])
                    <a href="/dashboard/reports" class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>    
                    @else
                    <a onclick="printPDF()" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan</a>
                    <a href="/dashboard/reports/{{ $report->slug }}/edit" class="d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                    class="fas fa-user-edit fa-sm text-white-50"></i> Edit</a>
                    @livewire('show-alert', ['reportId' => $report->id])
                    <a href="/dashboard/reports" class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                            class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
                    @endcan
                </div>
            </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-lg-4">
            <ul class="list-group list-group-flush shadow border-left-primary card d-flex mb-3">
                <li class="list-group-item">
                    <div class="ms-2 me-auto text-gray-700">
                        <div class="text-gray-550">Lokasi Kejadian : </div>
                        {{  $report->lokKejadian }}
                      </div>
                </li>
                <li class="list-group-item">
                    <div class="ms-2 me-auto text-gray-700">
                        <div class="text-gray-550">Tanggal Kejadian : </div>
                        {{ date('d F Y', strtotime($report->tglKejadian)); }}
                      </div>
                </li>
            </ul>
        </div>
        <div class="col-lg-4">
            <ul class="list-group list-group-flush shadow border-left-primary card d-flex mb-3">
                <li class="list-group-item">
                    <div class="ms-2 me-auto text-gray-700">
                        <div class="text-gray-550">Nama Pelapor : </div>
                        {{ $report->user->name }}
                      </div>
                </li>
                <li class="list-group-item">
                    <div class="ms-2 me-auto text-gray-700">
                        <div class="text-gray-550">Email : </div>
                        {{  $report->user->email }}
                      </div>
                </li>
            </ul>
        </div>
        <div class="col-lg-4">
            <ul class="list-group list-group-flush shadow border-left-primary card d-flex mb-3">
                <li class="list-group-item">
                    <div class="ms-2 me-auto text-gray-700">
                        <div class="text-gray-550">Kategori Laporan : </div>
                        {{  $report->Kategori }}
                      </div>
                </li>
                <li class="list-group-item">
                    <div class="ms-2 me-auto text-gray-700">
                        <div class="text-gray-550">Klasifikasi Laporan : </div>
                        {{ $report->classification->name }}
                      </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-lg-8">
            <!-- Dropdown Card Example -->
            <div class="card shadow mb-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary d-block">Isi Laporan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <h4>{{ $report->title }}</h4>
                    {{ $report->body }}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Basic Card Example -->
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lampiran foto</h6>
                </div>
                <div class="card-body">
                    @if ($report->image)
                    <div style="width: 275px">
                        <img src="{{ asset('storage/' . $report->image) }}" alt="{{ $report->classification->name }}" class="img-fluid">
                    </div>
                    @else
                        <img src="{{ asset('img/default.png') }}" alt="{{ $report->classification->name }}" style="width: 150px" class="img-fluid">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function printPDF() {
      window.open("/print/{{ $report->slug }}");
    }
</script>
@endsection