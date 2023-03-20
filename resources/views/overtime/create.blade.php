@extends('style.regovertime')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">   
                    <form method="POST" action="{{ route('overtimes.store') }}">
                        @csrf     
                             
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Buat SPL</strong></h3>
                            </div>
                            
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-list-ol" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nomor SPL" id="nomor" name="nomor" value="SPL{{ date(now()->format('dmYHis')) }}" readonly="readonly">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-calendar" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <select class="form-control" id="hari" name="hari">
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                    <select class="form-control" id="hspl" name="hspl">
                                        @for($i=1;$i<32;$i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select class="form-control" id="bspl" name="bspl">
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
                                    <select class="form-control" id="thspl" name="thspl">
                                        {{ $tahun = date(now()->format('Y')) }}
                                        @for($i=$tahun;$i<$tahun+5;$i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-tasks" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <select class="form-control" id="waktu" name="waktu">
                                        <option value="Hari Kerja">Hari Kerja</option>
                                        <option value="Hari Libur">Hari Libur</option>
                                    </select>    
                                    <input type="text" class="form-control" readonly="readonly" value="{{ Auth::user()->name }}" id="pemohon" name="pemohon">
                                    <input type="text" class="form-control" placeholder="Manager Approval" id="manajer" name="manajer" readonly="readonly" hidden="hidden">
                                    <input type="text" class="form-control" placeholder="HR Approval" id="hr" name="hr" readonly="readonly" hidden="hidden">
                                </div>

                                @if(Auth::user()->admin == 2 || Auth::user()->admin == 3)
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-th" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <select class="form-control" id="bisnis" name="bisnis">
                                        @foreach($unit as $item)
                                            <option value="{{ Crypt::decryptString($item->nama) }}">{{ Crypt::decryptString($item->nama) }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control" id="divisi" name="divisi">
                                        @foreach($divisi as $item)
                                            <option value="{{ Crypt::decryptString($item->nama) }}">{{ Crypt::decryptString($item->nama) }}</option>
                                        @endforeach
                                    </select>       
                                </div>
                                @else
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-th" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" readonly="readonly" value="{{ Auth::user()->bisnis }}" id="bisnis" name="bisnis">
                                    <input type="text" class="form-control" readonly="readonly" value="{{ Auth::user()->divisi }}" id="divisi" name="divisi">
                                    </select>       
                                </div>
                                @endif

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-edit" style="width: 15px"></span>
                                        </div>
                                    </div>   
                                    <input type="text" class="form-control" placeholder="Catatan" id="catatan" name="catatan">
                                    <input type="text" class="form-control" placeholder="Status SPL" id="status" name="status" readonly="readonly" hidden="hidden">
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