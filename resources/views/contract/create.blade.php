@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('contracts.store') }}">
                        @csrf              

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
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $user->id }}" hidden="hidden">
                                    <input type="text" class="form-control" id="direktur" name="direktur" value="{{ $office->direktur }}" hidden="hidden">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama" value="{{ $user->name }}">
                                    <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="{{ $user->email }}">

                                    <input type="text" class="form-control" hidden="hidden" id="gender" name="gender" value="{{ Crypt::decryptString($profile->gender) }}">
                                    <input type="text" class="form-control" hidden="hidden" id="agama" name="agama"  value="{{ Crypt::decryptString($profile->agama) }}">
                                    <input type="text" class="form-control" hidden="hidden" id="tempatlahir" name="tempatlahir"  value="{{ Crypt::decryptString($profile->tempatlahir) }}">
                                    <input type="text" class="form-control" hidden="hidden" id="hlahir" name="hlahir"  value="{{ Crypt::decryptString($profile->hari) }}">
                                    <input type="text" class="form-control" hidden="hidden" id="blahir" name="blahir"  value="{{ Crypt::decryptString($profile->bulan) }}">
                                    <input type="text" class="form-control" hidden="hidden" id="thlahir" name="thlahir"  value="{{ Crypt::decryptString($profile->tahun) }}">
                                    <input type="text" class="form-control" hidden="hidden" id="alamat" name="alamat"  value="{{ Crypt::decryptString($profile->domisili) }}">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-id-card" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="No. KK" id="kk" name="kk">
                                    <input type="text" class="form-control" placeholder="No. KTP" id="ktp" name="ktp" value="{{ Crypt::decryptString($profile->nik) }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-id-card" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="NPWP" id="npwp" name="npwp">
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
                                    <input type="text" class="form-control" hidden="hidden" id="tingkat" name="tingkat"  value="{{ Crypt::decryptString($profile->tingkat) }}">
                                    <input type="text" class="form-control" placeholder="Nomor ijazah" id="ijazah" name="ijazah">
                                    <input type="text" class="form-control" placeholder="Sertifikat" id="sertifikat" name="sertifikat">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-book" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <select class="form-control" id="universitas" name="universitas">
                                        @foreach($study as $item)
                                            <option value="{{ $item->nama }}">{{ Crypt::decryptString($item->nama) }}</option>
                                        @endforeach
                                    </select>
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
                                    <select class="form-control" id="jurusan" name="jurusan">
                                        @foreach($study as $item)
                                        @if(Crypt::decryptString($item->jurfak) != '')
                                            <option value="{{ $item->jurfak }}">{{ Crypt::decryptString($item->jurfak) }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group mb-0">
                                    <div class="form-control" style="border: none">
                                        <p>Tahun Lulus</p>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-calendar" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    
                                    <select class="form-control" id="lulus" name="lulus">
                                        @foreach($study as $item)
                                            <option value="{{ $item->keluar }}">{{ Crypt::decryptString($item->keluar) }}</option>
                                        @endforeach
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
                                    <div class="input-group-text">
                                        <span class="fas fa-check-square" style="width: 15px"></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nomor Urut Kontrak (3 digit)" id="code" name="code">
    
                                    @foreach($application as $item)
                                        <input value="{{ "/DIR/HRD - PK/" }}" type="text" class="form-control" readonly="readonly" id="nomortengah" name="nomortengah">
                                        <select class="form-control" id="kantor" name="kantor">
                                            @foreach ($unit as $unit)
                                                <option value="{{ $unit->nama }}">{{ $unit->nama }}</option>
                                            @endforeach
                                        </select>     
                                        <input type="text" class="form-control" readonly="readonly" id="nomorakhir" name="nomorakhir"
                                            @if(Crypt::decryptString($item->gabungbulan) == "Januari")
                                            value= "{{ "/I/" . Crypt::decryptString($item->gabungtahun)}}"
                                            @elseif(Crypt::decryptString($item->gabungbulan) == "Februari")
                                            value= "{{ "/II/" . Crypt::decryptString($item->gabungtahun)}}"
                                            @elseif(Crypt::decryptString($item->gabungbulan) == "Maret")
                                            value= "{{ "/III/" . Crypt::decryptString($item->gabungtahun)}}"
                                            @elseif(Crypt::decryptString($item->gabungbulan) == "April")
                                            value= "{{ "/IV/" . Crypt::decryptString($item->gabungtahun)}}"
                                            @elseif(Crypt::decryptString($item->gabungbulan) == "Mei")
                                            value= "{{ "/V/" . Crypt::decryptString($item->gabungtahun)}}"
                                            @elseif(Crypt::decryptString($item->gabungbulan) == "Juni")
                                            value= "{{ "/VI/" . Crypt::decryptString($item->gabungtahun)}}"
                                            @elseif(Crypt::decryptString($item->gabungbulan) == "Juli")
                                            value= "{{ "/VII/" . Crypt::decryptString($item->gabungtahun)}}"
                                            @elseif(Crypt::decryptString($item->gabungbulan) == "Agustus")
                                            value= "{{ "/VIII/" . Crypt::decryptString($item->gabungtahun)}}"
                                            @elseif(Crypt::decryptString($item->gabungbulan) == "September")
                                            value= "{{ "/IX/" . Crypt::decryptString($item->gabungtahun)}}"
                                            @elseif(Crypt::decryptString($item->gabungbulan) == "Oktober")
                                            value= "{{ "/X/" . Crypt::decryptString($item->gabungtahun)}}"
                                            @elseif(Crypt::decryptString($item->gabungbulan) == "November")
                                            value= "{{ "/XI/" . Crypt::decryptString($item->gabungtahun)}}"
                                            @elseif(Crypt::decryptString($item->gabungbulan) == "Desember")
                                            value= "{{ "/XII/" . Crypt::decryptString($item->gabungtahun)}}"
                                            @endif
                                        >
                                    @endforeach
                                    


                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-id-badge" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="No. ID Karyawan" id="nik" name="nik">
                                </div>

                                <div class="input-group mb-0">
                                    <div class="form-control" style="border: none">
                                        <p>Awal Kontrak (Hari/Bln/Thn)</p>
                                    </div>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-calendar" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    @foreach($application as $item)
                                        <input type="text" class="form-control" value="{{ Crypt::decryptString($item->gabunghari) }}" readonly="readonly" id="awalkontrakhari" name="awalkontrakhari">
                                        <input type="text" class="form-control" value="{{ Crypt::decryptString($item->gabungbulan) }}" readonly="readonly" id="awalkontrakbulan" name="awalkontrakbulan">
                                        <input type="text" class="form-control" value="{{ Crypt::decryptString($item->gabungtahun) }}" readonly="readonly" id="awalkontraktahun" name="awalkontraktahun">
                                    @endforeach
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
                                        <option value="3">3 bulan</option>
                                        <option value="6">6 bulan</option>
                                        <option value="12">12 bulan</option>
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
                                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select> 
                                    <select class="form-control" id="posisi" name="posisi">
                                        @foreach($application as $item)
                                            <option value="{{ $item->posisi }}">{{ Crypt::decryptString($item->posisi) }}</option>
                                            @if($item->posisialt != '')<option value="{{ $item->posisialt }}">{{ Crypt::decryptString($item->posisialt) }}</option>@endif
                                        @endforeach
                                    </select>    
                                </div>

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