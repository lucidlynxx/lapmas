<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>LAPMAS | {{ $title }}</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Icons Bootstrap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"
    />

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/css/form-validation.css" rel="stylesheet">
    
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-3 text-center">
      <h2>Formulir Laporan (Anonim)</h2>
      <p class="lead">Ini Adalah Formulir Laporan khusus pengguna tanpa akun (Anonim)<br> Nama anda tidak akan terpublikasi pada laporan</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-9">
        <h4 class="mb-3">Sampaikan Laporan Anda</h4>
        <form method="post" action="/lapor" enctype="multipart/form-data">
          @csrf
          <div class="row g-3">

              <label class="form-label" for="klasifikasiLaporan">Pilih Klasifikasi Laporan</label>
              @error('classification_id')
              <p class="text-danger">{{ $message }}</p>
              @enderror
              <div class="my-3">

                <div class="form-check form-check-inline">
                  <input id="pengaduan" name="classification_id" type="radio" class="form-check-input" value="1" required 
                  @if (old('classification_id') == '1')
                      checked
                  @endif>
                  <label class="form-check-label" for="pengaduan">Pengaduan</label>
                </div>

                <div class="form-check form-check-inline">
                  <input id="aspirasi" name="classification_id" type="radio" class="form-check-input" value="2" required
                  @if (old('classification_id') == '2')
                      checked
                  @endif>
                  <label class="form-check-label" for="aspirasi">Aspirasi</label>
                </div>

                <div class="form-check form-check-inline">
                  <input id="permintaanInformasi" name="classification_id" type="radio" class="form-check-input" value="3" required
                  @if (old('classification_id') == '3')
                      checked
                  @endif>
                  <label class="form-check-label" for="permintaanInformasi">Permintaan Informasi</label>
                </div>

              </div>

            <div class="col-12">
              <label for="title" class="form-label">Judul Laporan</label>
              <input type="text" class="form-control 
              @error('title')
                  is-invalid
              @enderror" id="title" name="title" value="{{ old('title') }}" required>
              @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('title') }}" required>

            <div class="col-12">
                <label for="body" class="form-label">Isi Laporan <span class="text-muted">(Isi minimal 25 karakter)</span></label>
                <textarea class="form-control
                @error('body')
                  is-invalid
                @enderror" id="body" name="body" rows="5" required>{{ old('body') }}</textarea>
                @error('body')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            <div class="col-md-5">
              <label for="lokKejadian" class="form-label">Lokasi Kejadian</label>
              <input type="text" class="form-control
              @error('lokKejadian')
                  is-invalid
              @enderror" id="lokKejadian" name="lokKejadian" value="{{ old('lokKejadian') }}" required>
              @error('lokKejadian')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="col-md-4">
              <label for="Kategori" class="form-label">Kategori Laporan</label>
              <select class="form-select @error('Kategori')
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

            <div class="col-md-3">
              <label for="tglKejadian" class="form-label">Tanggal Kejadian</label>
              <input type="date" class="form-control 
              @error('tglKejadian')
                  is-invalid
              @enderror" id="tglKejadian" name="tglKejadian" value="{{ old('tglKejadian') }}" required>
              @error('tglKejadian')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="my-3">
                <label for="image" class="form-label">Upload foto <span class="text-muted">(Opsional) (Maksimal ukuran foto 2 MB)</span></label>
                <img class="img-preview img-fluid mt-1 mb-3 col-sm-4">
                <input class="form-control
                @error('image')
                  is-invalid
                @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            <hr class="my-3">
            
            <div class="col-lg-6">
                <a href="/" class="w-100 btn btn-danger btn">Kembali</a>
            </div>
            <div class="col-lg-6">
                <button class="w-100 btn btn-primary btn" type="submit">Kirim Laporan</button>
            </div>

        </form>
      </div>
    </div>
  </main>

  <footer class="text-center mt-3 my-5 pt-5 text-white-30">
    <p>
      Hand-crafted with <i class="bi bi-suit-heart-fill text-danger"></i> by
      <strong class="text-dark">{{ $author }}</strong>
    </p>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/lapor/create/makeSlug1?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
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

@include('sweetalert::alert')

  </body>
</html>
