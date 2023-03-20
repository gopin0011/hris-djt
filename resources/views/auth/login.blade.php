@extends('style.reg')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('login') }}"><span class="fas fa-users"></span> <b>DJT</b>|HRIS</a>
        </div>
        <div class="card">

            <div class="card-body login-card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <p class="login-box-msg">Masuk ke dalam akun anda</p>
                        <div class="mb-3 input-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Masukkan email anda')" oninput="setCustomValidity('')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>     
                        </div>
                        </div>
                        <div class="mb-3 input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                        <div class="col-12">
                            <table class="w-100" style="margin-top: 10px">
                            <tr>
                                <td style="text-align: left;font-size:10pt"><a href="{{ route('password.request') }}">Lupa Password</a></td>
                                <td style="text-align: right;font-size:10pt"><a href="{{ route('register') }}">Registrasi</a></td>
                            </tr>     
                            </table>
                        </div>    
                        <!-- /.col -->
                        </div>                
                </form>
            </div>
            <!-- /.login-card-body -->
          </div>
    </div>
@endsection
