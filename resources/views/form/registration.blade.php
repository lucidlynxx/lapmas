<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPMAS | {{ $title }}</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet" />
</head>

<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-xl-10 mx-auto">
          <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
            <div class="card-img-left d-none d-md-flex">
              <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body p-4 p-sm-5">
              <h5 class="card-title text-center mb-4 fw-normal fs-3">Registration Form</h5>

              <form action="/register" method="post">
                @csrf
  
                <div class="form-floating mb-3">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" required autofocus value="{{ old('name') }}">
                  <label for="name">Name</label>
                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
  
                <div class="form-floating mb-3">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" required value="{{ old('email') }}">
                  <label for="email">Email address</label>
                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-floating mb-3">
                  <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" placeholder="NIK" required value="{{ old('nik') }}">
                  <label for="nik">NIK</label>
                  @error('nik')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-floating mb-3">
                  <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat" required value="{{ old('alamat') }}">
                  <label for="alamat">Alamat</label>
                  @error('alamat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-floating mb-3">
                  <input type="text" class="form-control @error('rtrw') is-invalid @enderror" name="rtrw" id="rtrw" placeholder="RT/RW" required value="{{ old('rtrw') }}">
                  <label for="rtrw">RT/RW</label>
                  @error('rtrw')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
  
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                    <label for="password_confirmation">Confirm Password</label>
                    @error('confirmPassword')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
  
                <div class="d-grid mb-2">
                  <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Register</button>
                </div>

                <small class="d-block text-center mt-3">Already registered? <a class="text-center mt-2 text-decoration-none" href="/login">Login</a></small>
  
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @include('sweetalert::alert')

  </body>
</html>