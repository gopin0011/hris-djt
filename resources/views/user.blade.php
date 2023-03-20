@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">          
                    @if(Auth::user()->admin == 0)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Cara Melamar</strong></h3>
                        </div>
                        <div class="card-body"> 
                            <div class="card">
                                <table>
                                    <tr style="height: 50px">
                                        <td><i style="font-size: 15pt" class="nav-icon fas fa-edit"></i></td>
                                        <td>Isi data pelamar lengkap dan sebenar-benarnya</td>
                                    </tr>
                                    <tr style="height: 50px">
                                        <td><i style="font-size: 15pt" class="nav-icon fas fa-upload"></i></td>
                                        <td>Upload data pendukung dalam bentuk PDF seperti CV, KTP, NPWP, ijazah, transkip nilai, foto terupdate, portofolio desain.</td>
                                    </tr>
                                    <tr style="height: 50px">
                                        <td><i style="font-size: 15pt" class="nav-icon fas fa-check"></i></td>
                                        <td>Pilih lowongan pekerjaan. UNTUK PELAMAR YANG MENDAPATKAN INVITATION CODE, MASUKKAN INVITATION CODE ANDA PADA SAAT MEMILIH LOWONGAN PEKERJAAN.</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="mb-12" style="text-align: center">
                                <a style="width: 100px" href="{{ route('applications.index') }}" class="btn btn-primary btn-sm">Mulai</a>
                            </div>
                        </div>
                    </div>
                    @elseif(Auth::user()->admin == 1 ||Auth::user()->admin == 11)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Cara Melamar</strong></h3>
                        </div>
                        <div class="card-body"> 
                            <div class="card">
                                <table>
                                    <tr style="height: 50px">
                                        <td><i style="font-size: 15pt" class="nav-icon fas fa-edit"></i></td>
                                        <td>Isi data pelamar lengkap dan sebenar-benarnya</td>
                                    </tr>
                                    <tr style="height: 50px">
                                        <td><i style="font-size: 15pt" class="nav-icon fas fa-upload"></i></td>
                                        <td>Upload data pendukung dalam bentuk PDF seperti CV, KTP, NPWP, ijazah, transkip nilai, foto terupdate, portofolio desain.</td>
                                    </tr>
                                    <tr style="height: 50px">
                                        <td><i style="font-size: 15pt" class="nav-icon fas fa-check"></i></td>
                                        <td>Pilih lowongan pekerjaan. UNTUK PELAMAR YANG MENDAPATKAN INVITATION CODE, MASUKKAN INVITATION CODE ANDA PADA SAAT MEMILIH LOWONGAN PEKERJAAN.</td>
                                    </tr>
                                    <tr style="height: 50px">
                                        <td><i style="font-size: 15pt" class="nav-icon fas fa-times"></i></td>
                                        <td>Wajib diisi, jika tidak lengkap/kosong data tidak akan terupdate sehingga tidak bisa diproses</td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection