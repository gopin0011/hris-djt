@extends('style.regemp')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('employees.update', ['id' => $data->id]) }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Ubah Data Karyawan</strong></h3>
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
                                            <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama" value="{{ Crypt::decryptString($data->nama) }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-envelope" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="{{ Crypt::decryptString($data->email) }}">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-id-card" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="No. KK" id="kk" name="kk" value="{{ Crypt::decryptString($data->kk) }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-address-card" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="No. KTP" id="ktp" name="ktp" value="{{ Crypt::decryptString($data->ktp) }}">
                                        </div>

                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-venus-mars" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="Pria" {{ Crypt::decryptString($data->gender) == "Pria" ? 'selected="selected"' : '' }}>Pria</option>
                                                <option value="Wanita" {{ Crypt::decryptString($data->gender) == "Wanita" ? 'selected="selected"' : '' }}>Wanita</option>
                                            </select>

                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-certificate" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <select class="form-control" id="agama" name="agama">
                                                <option value="Islam" {{ Crypt::decryptString($data->agama) == 'Islam' ? 'selected="selected"' : '' }}>Islam</option>
                                                <option value="Katolik" {{ Crypt::decryptString($data->agama) == 'Katolik' ? 'selected="selected"' : '' }}>Katolik</option>
                                                <option value="Protestan" {{ Crypt::decryptString($data->agama) == 'Protestan' ? 'selected="selected"' : '' }}>Protestan</option>
                                                <option value="Hindu" {{ Crypt::decryptString($data->agama) == 'Hindu' ? 'selected="selected"' : '' }}>Hindu</option>
                                                <option value="Budha" {{ Crypt::decryptString($data->agama) == 'Budha' ? 'selected="selected"' : '' }}>Budha</option>
                                                <option value="Kong Hu Cu" {{ Crypt::decryptString($data->agama) == 'Kong Hu Cu' ? 'selected="selected"' : '' }}>Kong Hu Cu</option>
                                                <option value="Aliran Kepercayaan" {{ Crypt::decryptString($data->agama) == 'Aliran Kepercayaan' ? 'selected="selected"' : '' }}>Aliran Kepercayaan</option>
                                            </select>
                                        </div>
                                        
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-map-pin" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Tempat Lahir" id="tmlahir" name="tmlahir" value="{{ Crypt::decryptString($data->tmlahir) }}">
                                            
                                            <select class="form-control" id="hlahir" name="hlahir">
                                                @for($i=1;$i<32;$i++)
                                                    <option value="{{ $i }}" {{ Crypt::decryptString($data->hlahir) == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <select class="form-control" id="blahir" name="blahir">
                                                <option value="Januari" {{ Crypt::decryptString($data->blahir) == "Januari" ? 'selected="selected"' : '' }}>Jan</option>
                                                <option value="Februari" {{ Crypt::decryptString($data->blahir) == "Februari" ? 'selected="selected"' : '' }}>Feb</option>
                                                <option value="Maret" {{ Crypt::decryptString($data->blahir) == "Maret" ? 'selected="selected"' : '' }}>Mar</option>
                                                <option value="April" {{ Crypt::decryptString($data->blahir) == "April" ? 'selected="selected"' : '' }}>Apr</option>
                                                <option value="Mei" {{ Crypt::decryptString($data->blahir) == "Mei" ? 'selected="selected"' : '' }}>Mei</option>
                                                <option value="Juni" {{ Crypt::decryptString($data->blahir) == "Juni" ? 'selected="selected"' : '' }}>Jun</option>
                                                <option value="Juli" {{ Crypt::decryptString($data->blahir) == "Juli" ? 'selected="selected"' : '' }}>Jul</option>
                                                <option value="Agustus" {{ Crypt::decryptString($data->blahir) == "Agustus" ? 'selected="selected"' : '' }}>Agu</option>
                                                <option value="September" {{ Crypt::decryptString($data->blahir) == "September" ? 'selected="selected"' : '' }}>Sep</option>
                                                <option value="Oktober" {{ Crypt::decryptString($data->blahir) == "Oktober" ? 'selected="selected"' : '' }}>Okt</option>
                                                <option value="November" {{ Crypt::decryptString($data->blahir) == "November" ? 'selected="selected"' : '' }}>Nov</option>
                                                <option value="Desember" {{ Crypt::decryptString($data->blahir) == "Desember" ? 'selected="selected"' : '' }}>Des</option>
                                            </select>
                                            <select class="form-control" id="thahir" name="thahir">
                                                {{ $tahun = date(now()->format('Y')) }}
                                                @for($i=$tahun - 10;$i>1900;$i--)
                                                    <option value="{{ $i }}" {{ Crypt::decryptString($data->thahir)  == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-map" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Alamat Domisili" id="alamat" name="alamat" value="{{ Crypt::decryptString($data->alamat) }}">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-edit" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Sertifikat" id="sertifikat" name="sertifikat" value="{{ $data->sertifikat }}"> 
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
                                            <input type="text" class="form-control" placeholder="NIK" id="nik" name="nik" value="{{ $data->nik }}">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-th-large" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <select class="form-control" id="bisnis" name="bisnis">
                                                @foreach ($unit as $unit)
                                                    <option value="{{ $unit->nama }}" {{ $unit->nama == $data->bisnis ? 'selected="selected"' : '' }}>{{ $unit->nama }}</option>
                                                @endforeach
                                            </select>

                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-th" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <select class="form-control" id="divisi" name="divisi">
                                                @foreach ($divisi as $divisi)
                                                    <option value="{{ $divisi->nama }}" {{ $divisi->nama == $data->divisi ? 'selected="selected"' : '' }}>{{ $divisi->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-sitemap" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Jabatan" id="jabatan" name="jabatan" value="{{ Crypt::decryptString($data->jabatan) }}">
                                            @if($data->status == "TLH")
                                            <select class="form-control" id="status" name="status">
                                                <option value="Kontrak" {{ $data->status == "Kontrak" ? 'selected="selected"' : '' }}>Kontrak</option>
                                                <option value="Tetap" {{ $data->status == "Tetap" ? 'selected="selected"' : '' }}>Tetap</option>
                                                <option value="TLH" {{ $data->status == "TLH" ? 'selected="selected"' : '' }}>TLH</option>
                                            </select>
                                            @else
                                            <select class="form-control" id="status" name="status">
                                                <option value="Kontrak" {{ $data->status == "Kontrak" ? 'selected="selected"' : '' }}>Kontrak</option>
                                                <option value="Tetap" {{ $data->status == "Tetap" ? 'selected="selected"' : '' }}>Tetap</option>
                                                <option value="TLH" {{ $data->status == "TLH" ? 'selected="selected"' : '' }}>TLH</option>
                                            </select>
                                            @endif
                                        </div>

                                        
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-play" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <select class="form-control" id="hjoin" name="hjoin">
                                                @for($i=1;$i<32;$i++)
                                                <option value="{{ $i }}" {{ $data->hjoin == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <select class="form-control" id="bjoin" name="bjoin">
                                                <option value="Januari" {{ $data->bjoin == "Januari" ? 'selected="selected"' : '' }}>Jan</option>
                                                <option value="Februari" {{ $data->bjoin == "Februari" ? 'selected="selected"' : '' }}>Feb</option>
                                                <option value="Maret" {{ $data->bjoin == "Maret" ? 'selected="selected"' : '' }}>Mar</option>
                                                <option value="April" {{ $data->bjoin == "April" ? 'selected="selected"' : '' }}>Apr</option>
                                                <option value="Mei" {{ $data->bjoin == "Mei" ? 'selected="selected"' : '' }}>Mei</option>
                                                <option value="Juni" {{ $data->bjoin == "Juni" ? 'selected="selected"' : '' }}>Jun</option>
                                                <option value="Juli" {{ $data->bjoin == "Juli" ? 'selected="selected"' : '' }}>Jul</option>
                                                <option value="Agustus" {{ $data->bjoin == "Agustus" ? 'selected="selected"' : '' }}>Agu</option>
                                                <option value="September" {{ $data->bjoin == "September" ? 'selected="selected"' : '' }}>Sep</option>
                                                <option value="Oktober" {{ $data->bjoin == "Oktober" ? 'selected="selected"' : '' }}>Okt</option>
                                                <option value="November" {{ $data->bjoin == "November" ? 'selected="selected"' : '' }}>Nov</option>
                                                <option value="Desember" {{ $data->bjoin == "Desember" ? 'selected="selected"' : '' }}>Des</option>
                                            </select>
                                            <select class="form-control" id="thjoin" name="thjoin">
                                                {{ $tahun = date(now()->format('Y')) }}
                                                @for($i=$tahun + 1;$i>2000;$i--)
                                                    <option value="{{ $i }}" {{ $data->thjoin  == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
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
                                                <option value="{{ $i }}" {{ $data->hakhir == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <select class="form-control" id="bakhir" name="bakhir">
                                                <option value="Januari" {{ $data->bakhir == "Januari" ? 'selected="selected"' : '' }}>Jan</option>
                                                <option value="Februari" {{ $data->bakhir == "Februari" ? 'selected="selected"' : '' }}>Feb</option>
                                                <option value="Maret" {{ $data->bakhir == "Maret" ? 'selected="selected"' : '' }}>Mar</option>
                                                <option value="April" {{ $data->bakhir == "April" ? 'selected="selected"' : '' }}>Apr</option>
                                                <option value="Mei" {{ $data->bakhir == "Mei" ? 'selected="selected"' : '' }}>Mei</option>
                                                <option value="Juni" {{ $data->bakhir == "Juni" ? 'selected="selected"' : '' }}>Jun</option>
                                                <option value="Juli" {{ $data->bakhir == "Juli" ? 'selected="selected"' : '' }}>Jul</option>
                                                <option value="Agustus" {{ $data->bakhir == "Agustus" ? 'selected="selected"' : '' }}>Agu</option>
                                                <option value="September" {{ $data->bakhir == "September" ? 'selected="selected"' : '' }}>Sep</option>
                                                <option value="Oktober" {{ $data->bakhir == "Oktober" ? 'selected="selected"' : '' }}>Okt</option>
                                                <option value="November" {{ $data->bakhir == "November" ? 'selected="selected"' : '' }}>Nov</option>
                                                <option value="Desember" {{ $data->bakhir == "Desember" ? 'selected="selected"' : '' }}>Des</option>
                                            </select>
                                            <select class="form-control" id="thakhir" name="thakhir">
                                                {{ $tahun = date(now()->format('Y')) }}
                                                @for($i=$tahun + 1;$i>2000;$i--)
                                                    <option value="{{ $i }}" {{ $data->thakhir  == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-times" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Tanggal Resign (Misal : 1 Januari 2022)" id="resign" name="resign" value="{{ $data->resign }}">
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
                                                <option value="SD" {{ Crypt::decryptString($data->pendidikan) == "SD" ? 'selected="selected"' : '' }}>SD</option>
                                                <option value="SMP" {{ Crypt::decryptString($data->pendidikan) == "SMP" ? 'selected="selected"' : '' }}>SMP</option>
                                                <option value="SMA" {{ Crypt::decryptString($data->pendidikan) == "SMA" ? 'selected="selected"' : '' }}>SMA/SMK</option>
                                                <option value="D1" {{ Crypt::decryptString($data->pendidikan) == "D1" ? 'selected="selected"' : '' }}>D1</option>
                                                <option value="D2" {{ Crypt::decryptString($data->pendidikan) == "D2" ? 'selected="selected"' : '' }}>D2</option>
                                                <option value="D3" {{ Crypt::decryptString($data->pendidikan) == "D3" ? 'selected="selected"' : '' }}>D3</option>
                                                <option value="D4" {{ Crypt::decryptString($data->pendidikan) == "D4" ? 'selected="selected"' : '' }}>D4</option>
                                                <option value="S1" {{ Crypt::decryptString($data->pendidikan) == "S1" ? 'selected="selected"' : '' }}>S1</option>
                                                <option value="S2" {{ Crypt::decryptString($data->pendidikan) == "S2" ? 'selected="selected"' : '' }}>S2</option>
                                                <option value="S3" {{ Crypt::decryptString($data->pendidikan) == "S3" ? 'selected="selected"' : '' }}>S3</option>
                                            </select>
                                            <input type="text" class="form-control" placeholder="Nama Sekolah" id="sekolah" name="sekolah" value="{{ Crypt::decryptString($data->sekolah) }}">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-graduation-cap" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Program Studi" id="prodi" name="prodi" value="{{ Crypt::decryptString($data->prodi) }}">
                                            <input type="text" class="form-control" placeholder="No. Ijazah" id="ijazah" name="ijazah" value="{{ Crypt::decryptString($data->ijazah) }}">
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
                                            @if(Auth::user()->admin == "3")<input type="text" class="form-control" placeholder="Gaji (misal: 5000000)" id="gaji" name="gaji" value="@if($data->gaji != ''){{ Crypt::decryptString($data->gaji) }}@endif">@endif
                                            <input type="text" class="form-control" placeholder="No. Rekening" id="rekening" name="rekening" value="@if($data->rekening != ''){{ Crypt::decryptString($data->rekening)}}@endif">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-credit-card" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="NPWP" id="npwp" name="npwp" value="@if($data->npwp != ''){{ Crypt::decryptString($data->npwp) }}@endif">
                                            <input type="text" class="form-control" placeholder="PTKP" id="ptkp" name="ptkp" value="@if($data->ptkp != ''){{ Crypt::decryptString($data->ptkp) }}@endif">
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