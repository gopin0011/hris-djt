@extends('style.reg')

@section('content')
<div class="register-box">
    <div class="card card-primary card-outline">
        <div class="card-header">
        <h5 class="m-0">Verifikasi Email</h5>
        </div>
        <div class="card-body">
        <p class="card-text">Tautan verifikasi telah <b>dikirim ke email anda</b>. Jika anda tidak mendapatkannya, cek <b>folder spam</b>, atau jika anda ingin mengirim ulang, klik tombol di bawah.</p>
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-primary">{{ __('Kirim ulang verifikasi') }}</button>
        </form>
        
        </div>
    </div>
</div>
@endsection
