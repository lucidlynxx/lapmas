@extends('dashboard.layouts.main')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center mb-3 justify-content-between">
            <div class="row">
                <div class="col">
                    <h1 class="h4 text-gray-800">Detail Pemberitahuan</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @can('admin')
                    <a href="/dashboard/messages/{{ $message->slug }}/edit" class="d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                        class="fas fa-user-edit fa-sm text-white-50"></i> Edit</a>
                    @livewire('show-message-alert', ['messageId' => $message->id])
                    @endcan    
                    <a href="/dashboard/messages" class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                        class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
                </div>
            </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-8">
            <!-- Dropdown Card Example -->
            <div class="card shadow mb-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary d-block">Isi Pemberitahuan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <h4>{{ $message->report->title }}</h4>
                    <h8>{{ $message->user->name }}</h8>
                    <h6>{{ date('d F Y', strtotime($message->created_at)); }}</h6>
                    {{ $message->body }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection