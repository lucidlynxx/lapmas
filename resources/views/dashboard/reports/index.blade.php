@extends('dashboard.layouts.main')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between">
    <!-- Page Heading -->
    @can('admin')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-block">
            <h2 class="h4 text-gray-800">Data Laporan Warga Desa Banyuresmi </h1>
            <p>Ini adalah halaman untuk mengelola seluruh data Laporan warga Desa Banyuresmi</p>
        </div>
    </div>
    @else    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-block">
            <h2 class="h4 text-gray-800">Data Laporan {{ auth()->user()->name }} </h1>
            <p>Ini adalah halaman untuk mengelola seluruh data Laporan {{ auth()->user()->name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-block">
            <a href="/dashboard/reports/create" class="d-sm-inline-block btn btn-primary shadow-sm mb-3"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Buat Laporan</a>
        </div>
    </div>
    @endcan
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Laporan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Klasifikasi</th>
                            @can('admin')
                            <th>Nama</th>
                            @endcan
                            <th>Judul Laporan</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Klasifikasi</th>
                            @can('admin')
                            <th>Nama</th>
                            @endcan
                            <th>Judul</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($reports as $report)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $report->classification->name }}</td>
                            @can('admin')
                            <td>{{ $report->user->name }}</td>
                            @endcan
                            <td>{{ $report->title }}</td>
                            <td>{{ $report->lokKejadian }}</td>
                            <td>{{ date('d-M-Y', strtotime($report->tglKejadian)); }}</td>
                            <td class="d-flex justify-content-end">
                                @can('admin')
                                <a href="/dashboard/reports/{{ $report->slug }}" class="btn btn-info border-0 d-inline inline-flex">
                                    <span class="icon text-white-100">
                                        <i class="fas fa-info-circle text-white"></i>
                                    </span>
                                </a>
                            @livewire('confirm-alert', ['reportId' => $report->id])
                                @else
                                <a href="/dashboard/reports/{{ $report->slug }}" class="btn btn-info border-0 d-inline inline-flex">
                                    <span class="icon text-white-100">
                                        <i class="fas fa-info-circle text-white"></i>
                                    </span>
                                </a>
                                <a href="/dashboard/reports/{{ $report->slug }}/edit" class="btn btn-warning border-0 d-inline inline-flex ml-1">
                                    <span class="icon text-white-100">
                                        <i class="fas fa-user-edit text-white"></i>
                                    </span>
                                </a>
                            @livewire('confirm-alert', ['reportId' => $report->id])
                                @endcan
                                {{-- <form action="/dashboard/reports/{{ $report->slug }}" method="post" class="d-inline inline-flex ml-1">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger border-0">
                                        <span class="icon text-white-100">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid --> 
@endsection