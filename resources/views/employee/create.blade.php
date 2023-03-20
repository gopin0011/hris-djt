@extends('style.regemp')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('employees.store') }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Tambah Data Karyawan</strong></h3>
                            </div>
                                <div class="card-body"> 
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><strong>Data Pribadi</strong></h3>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-user" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-id-card" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="No. KK" id="kk" name="kk">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-address-card" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="No. KTP" id="ktp" name="ktp">
                                        </div>

                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-venus-mars" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="Pria">Pria</option>
                                                <option value="Wanita">Wanita</option>
                                            </select>

                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-certificate" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <select class="form-control" id="agama" name="agama">
                                                <option value="Islam">Islam</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Protestan">Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Kong Hu Cu">Kong Hu Cu</option>
                                                <option value="Aliran Kepercayaan">Aliran Kepercayaan</option>
                                            </select>
                                        </div>
                                        
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-map-pin" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Tempat Lahir" id="tmlahir" name="tmlahir">
                                            
                                            <select class="form-control" id="hlahir" name="hlahir">
                                                @for($i=1;$i<32;$i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <select class="form-control" id="blahir" name="blahir">
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                            </select>
                                            <select class="form-control" id="thahir" name="thahir">
                                                {{ $tahun = date(now()->format('Y')) }}
                                                @for($i=$tahun -10;$i>1900;$i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-map" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Alamat Domisili" id="alamat" name="alamat">
                                        </div>
                                    </div>
                                    
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><strong>Data Pekerjaan</strong></h3>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-address-card" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="NIK" id="nik" name="nik">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-th-large" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <select class="form-control" id="unit" name="unit">
                                                @foreach ($unit as $item)
                                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>

                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-th" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <select class="form-control" id="divisi" name="divisi">
                                                @foreach ($divisi as $item)
                                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-sitemap" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Jabatan" id="jabatan" name="jabatan">
                                            <select class="form-control" id="status" name="status">
                                                <option value="Kontrak">Kontrak</option>
                                                <option value="Tetap">Tetap</option>
                                                <option value="TLH">TLH</option>
                                            </select>
                                        </div>

                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-play" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            
                                            <select class="form-control" id="hjoin" name="hjoin">
                                                @for($i=1;$i<32;$i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <select class="form-control" id="bjoin" name="bjoin">
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                            </select>
                                            <select class="form-control" id="thjoin" name="thjoin">
                                                {{ $tahun = date(now()->format('Y')) }}
                                                @for($i=$tahun + 1;$i>2000;$i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-stop" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            
                                            <select class="form-control" id="hakhir" name="hakhir">
                                                @for($i=1;$i<32;$i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <select class="form-control" id="bakhir" name="bakhir">
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                            </select>
                                            <select class="form-control" id="thakhir" name="thakhir">
                                                {{ $tahun = date(now()->format('Y')) }}
                                                @for($i=$tahun + 1;$i>2000;$i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><strong>Data Pendidikan</strong></h3>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-building" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <select class="form-control" id="pendidikan" name="pendidikan">
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA/SMK</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="D3">D3</option>
                                                <option value="D4">D4</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                            <input type="text" class="form-control" placeholder="Nama Sekolah" id="sekolah" name="sekolah">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-graduation-cap" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Program Studi" id="prodi" name="prodi">
                                            <input type="text" class="form-control" placeholder="No. Ijazah" id="ijazah" name="ijazah">
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><strong>Data Keuangan dan Pajak</strong></h3>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-credit-card" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            @if(Auth::user()->admin == "3")<input type="text" class="form-control" placeholder="Gaji (misal: 5000000)" id="gaji" name="gaji">@endif
                                            <input type="text" class="form-control" placeholder="No. Rekening" id="rekening" name="rekening">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-credit-card" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="NPWP" id="npwp" name="npwp">
                                            <input type="text" class="form-control" placeholder="PTKP" id="ptkp" name="ptkp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection