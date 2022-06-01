@extends('layouts.main')

@section('container')   
<div class="row justify-content-center">
  <div class="col-md-7">
    <main class="form-signin">

      <h1 class="h3 mb-3 fw-normal">Please Login</h1>
      <form action="/login" method="post">
      @csrf
        <div class="form-floating text-black-50">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
          <label for="email">Email address</label>
          @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>

        <div class="form-floating text-black-50">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
      
        <button class="w-100 btn btn-lg btn-secondary fw-bold border-white bg-white mb-3" type="submit">login</button>
      </form>

    </main> 
  </div>
</div>
<small class="d-block text-center mt-3">Not registered? <a href="/register" class="text-decoration-none">Register Now!</a></small>
@endsection