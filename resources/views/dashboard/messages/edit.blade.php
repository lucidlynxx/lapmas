@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center mb-3 justify-content-between">
      <div class="row">
          <div class="col">
            <h1 class="h4 text-gray-800">Form Edit Pemberitahuan</h1>
            <p>Ini adalah halaman untuk mengedit pemberitahuan</p>
        </div>
      </div>
      <div class="row">
        <div class="col">
            <a href="/dashboard/messages" class="d-sm-inline-block btn btn-secondary shadow-sm"><i
            class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        </div>
      </div>
    </div>
  
    <div class="row">
      <div class="col-lg-9">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Pemberitahuan</h6>
            </div>
            <div class="card-body">
              <form method="post" action="/dashboard/messages/{{ $message->slug }}">
                @method('put')
                @csrf
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="title">Judul Pemberitahuan</label>
                        <input type="text" class="form-control @error('title')
                        is-invalid
                        @enderror" id="title" name="title" value="{{ old('title', $message->title) }}" required>
                        @error('title')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                        <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('title', $message->slug) }}" required>
                      <div class="col-md-6 mb-3">
                        <label for="user_id">Kirim Pemberitahuan ke</label>
                        <select class="custom-select @error('user_id')
                        is-invalid
                        @enderror" id="user_id" name="user_id" required>
                        @foreach ($users as $user)
                            @if (old('user_id', $message->user_id) == $user->id)
                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                        </select>
                        @error('user_id')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
    
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <label for="body">Isi Pemberitahuan <span class="text-muted">(Isi minimal 25 karakter)</span></label>
                        <textarea rows="8" class="form-control @error('body')
                        is-invalid
                        @enderror" id="body" name="body" rows="3" required>{{ old('body', $message->body) }}</textarea>
                        @error('body')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-4">
                        <button type="submit" class="w-100 btn btn-primary mt-3">Edit Pemberitahuan</button>
                      </div>
                    </div>
              </form>
        </div>
      </div>
    </div>
</div>
<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/dashboard/reports/makeSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });
</script>
@endsection