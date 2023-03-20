@extends('style.regovertime')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">   
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Masukkan Tanggal SPL</strong></h3>
                            <form method="POST" target="_blank" action="{{ route('overtimes.caprint')}}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-calendar" style="width: 15px"></span>
                                        </div>
                                    </div>

                                    <select class="form-control" id="hari" name="hari">
                                        @for($i=1;$i<32;$i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select class="form-control" id="bulan" name="bulan">
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
                                    <select class="form-control" id="tahun" name="tahun">
                                        {{ $tahun = date(now()->format('Y')) }}
                                        @for($i=$tahun;$i<$tahun+5;$i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-th-large" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <select class="form-control" id="bisnis" name="bisnis">
                                        @foreach($unit as $item)
                                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-block">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection