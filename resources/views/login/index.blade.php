@extends('layouts/main')

@section('container')

<div class="row justify-content-center mt-4">
    <div class="col-md-5">

      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>{{ session('success') }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
      @endif

      @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <p>{{ session('loginError') }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
      @endif

      <main class="form-signin">
          <h1 class="h3 mb-3 fw-normal text-center">Halaman Log in</h1>
          <form action="/login" method="post">
            @csrf
            <div class="form-floating">
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" autofocus required value="{{ old('email') }}">
              <label for="email">Email address</label>
              @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
              <label for="password">Password</label>
            </div>
        
            <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
          </form>
          <small class="d-block text-center mt-3">Belum punya akun? <a href="/register">daftar sekarang!</a></small>
      </main>
    </div>
</div>

@endsection