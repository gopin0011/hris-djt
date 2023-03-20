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
              @csrf
              <div class="input-group mb-3">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')">
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
                <div class="col-12">
                  <table class="w-100" style="margin-top: 10px">
                  <tr>
                      <td style="text-align: left;font-size:10pt"><a href="{{ route('login') }}">Login</a></td>
                      <td style="text-align: right;font-size:10pt"><a href="{{ route('register') }}">Registrasi</a></td>
                  </tr>     
                  </table>
              </div>    
              </div>
            </form>
          </div>
      </div>
</div>
@endsection
