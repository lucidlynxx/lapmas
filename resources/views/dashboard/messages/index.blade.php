@extends('dashboard.layouts.main')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between">
    <!-- Page Heading -->
    @can('admin')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-block">
            <h2 class="h4 text-gray-800">Data Pemberitahuan Warga Desa Banyuresmi </h1>
            <p>Ini adalah halaman untuk mengelola seluruh data Pemberitahuan warga Desa Banyuresmi</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-block">
            <a href="/dashboard/messages/create" class="d-sm-inline-block btn btn-primary shadow-sm mb-3"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Buat Pemberitahuan</a>
        </div>
    </div>
    @else    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-block">
            <h2 class="h4 text-gray-800">Data Pemberitahuan {{ auth()->user()->name }} </h1>
            <p>Ini adalah halaman untuk mengelola seluruh data Pemberitahuan {{ auth()->user()->name }}</p>
        </div>
    </div>
    @endcan
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pemberitahuan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            @can('admin')
                            <th>Nama</th>
                            @endcan
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            @can('admin')
                            <th>Nama</th>
                            @endcan
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($messages as $message)
                        @if ($message->status == 'belum dibaca')
                        <tr class="table-danger">
                            <td>{{ $loop->iteration }}</td>
                                <td>{{ $message->title }}</td>
                                @can('admin')
                                <td>{{ $message->user->name }}</td>
                                @endcan
                                <td>{{ date('d-M-Y', strtotime($message->created_at)); }}</td>
                                <td>{{ $message->status }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="/dashboard/messages/{{ $message->slug }}" class="btn btn-info border-0 d-inline inline-flex">
                                        <span class="icon text-white-100">
                                            <i class="fas fa-info-circle text-white"></i>
                                        </span>
                                    </a>
                                    @can('admin')
                                    <a href="/dashboard/messages/{{ $message->slug }}/edit" class="btn btn-warning border-0 d-inline inline-flex ml-1">
                                        <span class="icon text-white-100">
                                            <i class="fas fa-user-edit text-white"></i>
                                        </span>
                                    </a>
                                    @livewire('message-alert', ['messageId' => $message->id])
                                    @endcan
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $message->title }}</td>
                                @can('admin')
                                <td>{{ $message->user->name }}</td>
                                @endcan
                                <td>{{ date('d-M-Y', strtotime($message->created_at)); }}</td>
                                <td>{{ $message->status }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="/dashboard/messages/{{ $message->slug }}" class="btn btn-info border-0 d-inline inline-flex">
                                        <span class="icon text-white-100">
                                            <i class="fas fa-info-circle text-white"></i>
                                        </span>
                                    </a>
                                    @can('admin')
                                    <a href="/dashboard/messages/{{ $message->slug }}/edit" class="btn btn-warning border-0 d-inline inline-flex ml-1">
                                        <span class="icon text-white-100">
                                            <i class="fas fa-user-edit text-white"></i>
                                        </span>
                                    </a>
                                    @livewire('message-alert', ['messageId' => $message->id])
                                    @endcan
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid --> 
@endsection