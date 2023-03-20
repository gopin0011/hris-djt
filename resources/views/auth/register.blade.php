@extends('style.reg')

@section('content')
<div class="register-box">
    <div class="register-logo">
      <a href="{{ route('login') }}"><span class="fas fa-users"></span> <b>DJT</b>|HRIS</a>
    </div>
  
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Mendaftarkan akun baru</p>
  
        <form action="{{ route('register') }}" method="post">
            @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nama lengkap" name="name" id="name" required oninvalid="this.setCustomValidity('Masukkan nama lengkap anda')" oninput="setCustomValidity('')">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" id="email" required oninvalid="this.setCustomValidity('Email harus diisi')" oninput="setCustomValidity('')">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password *"  name="password" id="password" required oninvalid="this.setCustomValidity('Password harus diisi')" oninput="setCustomValidity('')">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>         
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Ulangi password" name="password_confirmation" id="password_confirmation" required oninvalid="this.setCustomValidity('Konfirmasi password')" oninput="setCustomValidity('')">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <table style="margin-left: 25px">
              <tr style="height: 5pt">
                <td style="font-size: 10pt; vertical-align: top">*</td>
                <td style="font-size: 10pt">Password minimal 8 karakter yang terdiri dari huruf kapital, huruf kecil, angka, dan simbol.</td>
              </tr>
            </table>
        </div>
          <div class="row">
            <div class="col-12">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required oninvalid="this.setCustomValidity('Anda harus menyetujui syarat dan ketentuan serta kebijakan privasi')" oninput="setCustomValidity('')">
                <label for="agreeTerms">
                <p style="font-weight: lighter;font-size:10pt">Setelah mendaftar, saya menyetujui <a href="#" target="_blank">Syarat dan Ketentuan</a> serta <a href="#" target="_blank">Kebijakan Privasi</a></p>
                </label>
              </div>
            </div>
            <div class="col-12" style="margin-top: -15px">
              <button type="submit" class="btn btn-primary btn-block" style="font-size: 10pt">Daftar</button>
            </div>
          </div>
        </form>
  
        <a href="{{ route('login') }}" class="text-center" style="font-size: 10pt">Telah mempunyai akun</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
@endsection
