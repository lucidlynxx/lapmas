@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center mb-3 justify-content-between">
        <!-- Page Heading -->
        <div class="row">
            <div class="col">
                <h1 class="h4 text-gray-800">Profile Settings</h1>
                <p>Ini adalah halaman untuk mengatur profile</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="/dashboard" class="d-sm-inline-block btn btn-secondary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Akun</h6>
                </div>
                <div class="card-body">
                    <form action="/dashboard/profile/{{ $user->name }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                              <label for="name">Nama</label>
                              <input type="text" class="form-control @error('name')
                                is-invalid
                              @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                              @error('name')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                              <label for="email">Email</label>
                              <input type="email" class="form-control @error('email')
                                  is-invalid
                              @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                              @error('email')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="passwordLama">Password Lama</label>
                                <input type="password" class="form-control @error('passwordLama')
                                    is-invalid
                                @enderror" id="passwordLama" name="passwordLama" value="" required>
                                @error('passwordLama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password">Password Baru</label>
                                <input type="password" class="form-control @error('password')
                                    is-invalid
                                @enderror" id="password" name="password" value="" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control @error('password_confirmation')
                                    is-invalid
                                @enderror" id="password_confirmation" name="password_confirmation" value="" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <button type="submit" class="w-50 btn btn-primary mt-3">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hapus Akun</h6>
            </div>
            <div class="card-body">
                Menghapus akun Anda adalah tindakan permanen dan tidak dapat dibatalkan. Jika Anda yakin ingin menghapus akun Anda, klik tombol di bawah ini.
                @livewire('user-profile-alert', ['userId' => $user->id])
            </div>
        </div>
    </div>
</div>
</div>
@endsection