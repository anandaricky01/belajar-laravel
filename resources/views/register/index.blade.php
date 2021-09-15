@extends('layouts/main')

@section('container')

<div class="row justify-content-center mt-4">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Halaman Registrasi</h1>
            <form action="/register" method="POST">
              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top" id="name" placeholder="name">
                <label for="name">Nama</label>
              </div>
              <div class="form-floating">
                <input type="text" name="username" class="form-control" id="username" placeholder="username">
                <label for="username">username</label>
              </div>
              <div class="form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                <label for="email">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom" id="password" placeholder="Password">
                <label for="password">Password</label>
              </div>
          
              <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Log in</button>
            </form>
            <small class="d-block text-center mt-3">Sudah punya akun? <a href="/login">klik di sini!</a></small>
        </main>
    </div>
</div>

@endsection