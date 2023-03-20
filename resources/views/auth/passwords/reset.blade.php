@extends('style.reg')

@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="{{ route('login') }}"><span class="fas fa-users"></span> <b>DJT</b>|HRIS</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Satu tahap lagi untuk mengembalikan akun anda, masukkan password baru anda.</p>
  
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="input-group mb-3">
                
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="email" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                </div>
            <div class="input-group mb-3">
                
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Masukkan password baru anda')" oninput="setCustomValidity('')" autocomplete="new-password">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi password" required oninvalid="this.setCustomValidity('Konfirmasi password baru anda')" oninput="setCustomValidity('')" autocomplete="new-password">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Ganti password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <p class="mt-3 mb-1">
            <a href="/login">Login</a>
        </p>
        <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center">Registrasi</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
@endsection
