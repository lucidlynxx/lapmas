@extends('dashboard.layouts.main')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-2 text-gray-800">Data Akun Pengguna LAPMAS</h1>
    <p class="mb-4">Ini adalah halaman untuk mengelola seluruh data Akun Pengguna LAPMAS</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Akun LAPMAS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ date('d-M-Y', strtotime($user->created_at)); }}</td>
                            <td>
                                @livewire('user-alert', ['userId' => $user->id])
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