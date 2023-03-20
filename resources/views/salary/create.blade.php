@extends('style.regemp')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">   
                    <form method="POST" action="{{ route('contracts.ekstensi') }}">
                        @csrf          
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Buat Kontrak/Perpanjangan Kontrak</strong></h3>
                            </div>
                            
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-id-card" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="NIK" id="nik" name="nik" value="{{ $data->nik }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-user" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama" value="{{ Crypt::decryptString($data->nama) }}">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" id="direktur" name="direktur" value="{{ $office->direktur }}" hidden="hidden">
                                </div>
                                @if(Auth::user()->admin == 3)
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-star" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <select class="form-control" id="kpi" name="kpi">
                                        <option value="">Pilih Nilai</option>
                                        <option value="A">KPI = A</option>
                                        <option value="B">KPI = B</option>
                                        <option value="C">KPI = C</option>
                                        <option value="D">KPI = D</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="Persentasi KPI" id="pkpi" name="pkpi">
                                    <input type="text" class="form-control" placeholder="Nominal" id="nominal" name="nominal">
                                </div>
                                @endif
                            </div>
                            
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><strong>Data Pribadi</strong></h3>
                                    <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body"> 
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" hidden="hidden" id="id" name="id" value="{{ $data->id }}">
                                        <input type="text" class="form-control" hidden="hidden" id="gender" name="gender" value="{{ Crypt::decryptString($data->gender) }}">
                                        <input type="text" class="form-control" hidden="hidden" id="agama" name="agama"  value="{{ Crypt::decryptString($data->agama) }}">
                                        <input type="text" class="form-control" hidden="hidden" id="tempatlahir" name="tempatlahir"  value="{{ Crypt::decryptString($data->tmlahir) }}">
                                        <input type="text" class="form-control" hidden="hidden" id="hlahir" name="hlahir"  value="{{ Crypt::decryptString($data->hlahir) }}">
                                        <input type="text" class="form-control" hidden="hidden" id="blahir" name="blahir"  value="{{ Crypt::decryptString($data->blahir) }}">
                                        <input type="text" class="form-control" hidden="hidden" id="thlahir" name="thlahir"  value="{{ Crypt::decryptString($data->thahir) }}">
                                        <input type="text" class="form-control" hidden="hidden" id="alamat" name="alamat"  value="{{ Crypt::decryptString($data->alamat) }}">
                                    </div>
                                    <div class="input-group mb-0">
                                    
                                        <div class="form-control" style="border: none">
                                            <p>Kartu Keluarga</p>
                                        </div>
                                        <div class="form-control" style="border: none">
                                            <p>KTP</p>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-id-card" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="No. KK" id="kk" name="kk" value="{{ Crypt::decryptString($data->kk) }}">
                                        <input type="text" class="form-control" placeholder="No. KTP" id="ktp" name="ktp" value="{{ Crypt::decryptString($data->ktp) }}">
                                    </div>
                                    <div class="input-group mb-0">                             
                                        <div class="form-control" style="border: none">
                                            <p>NPWP</p>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-id-card" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="NPWP" id="npwp" name="npwp" value="{{ Crypt::decryptString($data->npwp) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><strong>Data Ijazah</strong></h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body"> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-bookmark" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" hidden="hidden" id="tingkat" name="tingkat"  value="{{ Crypt::decryptString($data->pendidikan) }}">
                                        <input type="text" class="form-control" placeholder="Nomor ijazah" id="ijazah" name="ijazah" value="{{ Crypt::decryptString($data->ijazah) }}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-book" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nama Sekolah" id="sekolah" name="sekolah" value="{{ Crypt::decryptString($data->sekolah) }}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-asterisk " style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="NIM/NIS" id="nim" name="nim">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-flask" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Program Studi" id="prodi" name="prodi" value="{{ Crypt::decryptString($data->prodi) }}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-calendar" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        
                                        <select class="form-control" id="lulus" name="lulus">
                                            <option value="">Tahun Kelulusan</option>
                                            {{ $tahun = date(now()->format('Y')) }}
                                            @for($i=$tahun;$i>1980;$i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><strong>Data Kontrak</strong></h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body"> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-check-square" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nomor Kontrak" id="nomorawal" name="nomorawal" hidden>
                                        <input value="{{ "/DIR/HRD - PK/" }}" type="text" class="form-control" readonly="readonly" id="nomortengah" name="nomortengah" hidden>
                                        <select class="form-control" id="kantor" name="kantor">
                                            @foreach ($unit as $unit)
                                                <option value="{{ $unit->nama }}">{{ $unit->nama }}</option>
                                            @endforeach
                                        </select>         
                                    </div>

                                    <div class="input-group mb-0">
                                        <div class="form-control" style="border: none">
                                            <p>Awal Kontrak (Hari/Bln/Thn)</p>
                                        </div>
                                    </div>
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-calendar"></span>
                                            </div>
                                        </div>
                                        <select class="form-control" id="hkpi" name="hkpi">
                                            @for($i=1;$i<32;$i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <select class="form-control" id="bkpi" name="bkpi">
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
                                        <select class="form-control" id="thkpi" name="thkpi">
                                            {{ $tahun = date(now()->format('Y')) }}
                                            @for($i=$tahun;$i<$tahun+5;$i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                        </select>
                                    </div>

                                    <div class="input-group mb-0">
                                        <div class="form-control" style="border: none">
                                            <p>Akhir Kontrak (Hari/Bln/Thn)</p>
                                        </div>
                                    </div>
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-calendar" style="width: 15px"></span>
                                            </div>
                                        </div>

                                        <select class="form-control" id="akhirkontrakhari" name="akhirkontrakhari">
                                            @for($i=1;$i<32;$i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>

                                        <select class="form-control" id="akhirkontrakbulan" name="akhirkontrakbulan">
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
                                        <select class="form-control" id="akhirkontraktahun" name="akhirkontraktahun">
                                            {{ $tahun = date(now()->format('Y')) }}
                                            @for($i=$tahun;$i<$tahun+5;$i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-clock" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <select class="form-control" id="durasi" name="durasi">    
                                            @if(Auth::user()->admin == 3)
                                            <option value="Tetap">Tetap</option>
                                            <option value="3">3 bulan</option>
                                            <option value="6">6 bulan</option>
                                            <option value="12">12 bulan</option>
                                            @else
                                            <option value="TLH">TLH</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-sitemap" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <select class="form-control" id="divisi" name="divisi">
                                            @foreach($divisi as $item)
                                                <option value={{ $item->nama }} {{ $data->divisi ==  $item->nama ? 'selected="selected"' : '' }}>{{ $item->nama }}</option>
                                            @endforeach
                                        </select> 
                                        <input type="text" class="form-control" placeholder="Posisi" id="posisi" name="posisi" value="{{ Crypt::decryptString($data->jabatan) }}"> 
                                    </div>

                                    @if(Auth::user()->admin == 3)
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text" style="width: 40px">
                                            Rp.
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Gaji pokok (tulis tanpa titik)" id="gapok" name="gapok">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text" style="width: 40px">
                                            Rp.
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Gaji jabatan (tulis tanpa titik)" id="jabatan" name="jabatan">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text" style="width: 40px">
                                            Rp.
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Gaji kinerja (tulis tanpa titik)" id="kinerja" name="kinerja">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text" style="width: 40px">
                                            Rp.
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Gaji pulsa (tulis tanpa titik)" id="pulsa" name="pulsa">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text" style="width: 40px">
                                            Rp.
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Gaji makan (tulis tanpa titik)" id="makan" name="makan">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text" style="width: 40px">
                                            Rp.
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Gaji transport (tulis tanpa titik)" id="transport" name="transport">
                                    </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
