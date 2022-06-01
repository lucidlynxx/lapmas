@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center mb-3 justify-content-between">
        <!-- Page Heading -->
        <div class="row">
            <div class="col">
                <h1 class="h4 text-gray-800">Form Buat Laporan Baru</h1>
                <p>Ini adalah halaman untuk membuat laporan baru</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="/dashboard/reports" class="d-sm-inline-block btn btn-secondary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Form Laporan Baru</h6>
      </div>
      <div class="card-body">
        <form method="post" action="/dashboard/reports" enctype="multipart/form-data">
          @csrf
            <label class="form-label" for="classification_id">Pilih Klasifikasi Laporan</label>
            @error('classification_id')
              <p class="text-danger">{{ $message }}</p>
            @enderror
          <div class="row">
              <div class="col-lg-6 mb-4">

                <div class="custom-control custom-radio d-inline-flex">
                  <input id="pengaduan" name="classification_id" type="radio" class="custom-control-input" value="{{ $class[0]->id }}" required
                  @if (old('classification_id') == '1')
                      checked
                  @endif>
                  <label class="custom-control-label" for="pengaduan">Pengaduan</label>
                </div>

                <div class="custom-control custom-radio d-inline-flex ml-3">
                  <input id="aspirasi" name="classification_id" type="radio" class="custom-control-input" value="{{ $class[1]->id }}" required
                  @if (old('classification_id') == '2')
                      checked
                  @endif>
                  <label class="custom-control-label" for="aspirasi">Aspirasi</label>
                </div>

                <div class="custom-control custom-radio d-inline-flex ml-3">
                  <input id="permintaanInformasi" name="classification_id" type="radio" class="custom-control-input" value="{{ $class[2]->id }}" required
                  @if (old('classification_id') == '3')
                      checked
                  @endif>
                  <label class="custom-control-label" for="permintaanInformasi">Permintaan Informasi</label>
                </div>

              </div>
          </div>
    
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="title">Judul Laporan</label>
                  <input type="text" class="form-control @error('title')
                  is-invalid
                  @enderror" id="title" name="title" value="{{ old('title') }}" required>
                  @error('title')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                  <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('title') }}" required>
                <div class="col-md-6 mb-3">
                  <label for="kategori">Kategori Laporan</label>
                  <select class="custom-select @error('Kategori')
                  is-invalid
                  @enderror" id="Kategori" name="Kategori" required> 
                    <option value="{{ old('Kategori') }}" selected>{{ old('Kategori') }}</option>
                    <option value="Agama">Agama</option>
                    <option value="COVID-19">COVID-19</option>
                    <option value="Ketentraman, Ketertiban Umum dan Pelindungan Masyarakat">Ketentraman, Ketertiban Umum dan Pelindungan Masyarakat</option>
                    <option value="Lingkungan Hidup dan Kehutanan">Lingkungan Hidup dan Kehutanan</option>
                    <option value="Pembangunan Desa, Daerah Tertinggal dan Transmigrasi">Pembangunan Desa, Daerah Tertinggal dan Transmigrasi</option>
                    <option value="Pertanian dan Perternakan">Pertanian dan Perternakan</option>
                    <option value="Pendidikan dan Kebudayaan">Pendidikan dan Kebudayaan</option>
                    <option value="Sosial dan Kesejahteraan">Sosial dan Kesejahteraan</option>
                    <option value="Kependudukan">Kependudukan</option>>
                  </select>
                  @error('Kategori')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="lokKejadian">Lokasi Kejadian</label>
                  <input type="text" class="form-control @error('lokKejadian')
                  is-invalid
                  @enderror" id="lokKejadian" name="lokKejadian" value="{{ old('lokKejadian') }}" required>
                  @error('lokKejadian')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="tglKejadian">Tanggal Kejadian</label>
                  <input type="date" class="form-control @error('tglKejadian')
                  is-invalid
                  @enderror" id="tglKejadian" name="tglKejadian" value="{{ old('tglKejadian') }}" required>
                  @error('tglKejadian')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="body">Isi Laporan <span class="text-muted">(Isi minimal 25 karakter)</span></label>
                  <textarea rows="8" class="form-control @error('body')
                  is-invalid
                  @enderror" id="body" name="body" rows="3" required>{{ old('body') }}</textarea>
                  @error('body')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label for="image">Upload foto <span class="text-muted">(Opsional) (Maksimal ukuran foto 2 MB)</span></label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input @error('image')
                      is-invalid
                      @enderror" id="image" name="image" onchange="previewImage()">
                      <label class="custom-file-label" for="image">Choose file</label>
                      @error('image')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <img class="img-preview img-fluid mt-3 mb-3 col-sm-6">
                </div>
              </div>

              <hr class="my-3">

              <div class="row justify-content-center">
                <div class="col-lg-3">
                  <button type="submit" class="w-100 btn btn-primary mt-3">Buat Laporan</button>
                </div>
              </div>
            </form>
      </div>
    </div>
<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');
  
  title.addEventListener('change', function() {
    fetch('/dashboard/report/makeSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });

  document.querySelector('.custom-file-input').addEventListener('change',function(e) {
    let fileName = document.getElementById('image').files[0].name;
    let nextSibling = e.target.nextElementSibling;
    nextSibling.innerText = fileName;
  });

  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection