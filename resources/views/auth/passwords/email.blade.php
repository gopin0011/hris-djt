@extends('style.reg')

@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="{{ route('login') }}"><span class="fas fa-users"></span> <b>DJT</b>|HRIS</a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Masukkan email untuk reset password</p>
      
            <form action="{{ route('password.email') }}" method="post">
              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block">Ganti Password</button>
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
      </div>
</div>
@endsection
