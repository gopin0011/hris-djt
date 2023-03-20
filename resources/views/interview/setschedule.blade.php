@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if($reset == 0) 
                    <form method="POST" action="{{ route('interview.storeschedule', ['id' => $data->id]) }}">
                        @else
                    <form method="POST" action="{{ route('interview.postresetschedule', ['id' => $data->id]) }}">
                        @endif
                        @csrf          
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Menentukan Jadwal Interview</strong></h3>
                            </div>
                                   
                                    <div class="card-body"> 
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-user" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            @foreach ($user as $item)
                                            <input type="text" class="form-control" readonly="readonly" value="{{ $item->name }}">
                                            @endforeach
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span style="width: 15px">1</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" readonly="readonly" value="{{ Crypt::decryptString($data->posisi) }}">
                                        </div>

                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span style="width: 15px">2</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" readonly="readonly" value="@if($data->posisialt != ""){{ Crypt::decryptString($data->posisialt) }}@endif">
                                        </div>
                                        @if($reset == 0)    
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                    <span class="fas fa-calendar" style="width: 15px"></span>
                                                    </div>
                                                </div>

                                                <select class="form-control" id="jadwalhari" name="jadwalhari">
                                                    @for($i=1;$i<32;$i++)
                                                    <option value="{{ $i }}" {{ date(now()->format('j')) == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>

                                                <select class="form-control" id="jadwalbulan" name="jadwalbulan">
                                                    <option value="Januari" {{ date(now()->format('m')) == 1 ? 'selected="selected"' : '' }}>Januari</option>
                                                    <option value="Februari" {{ date(now()->format('m')) == 2 ? 'selected="selected"' : '' }}>Februari</option>
                                                    <option value="Maret" {{ date(now()->format('m')) == 3 ? 'selected="selected"' : '' }}>Maret</option>
                                                    <option value="April" {{ date(now()->format('m')) == 4 ? 'selected="selected"' : '' }}>April</option>
                                                    <option value="Mei" {{ date(now()->format('m')) == 5 ? 'selected="selected"' : '' }}>Mei</option>
                                                    <option value="Juni" {{ date(now()->format('m')) == 6 ? 'selected="selected"' : '' }}>Juni</option>
                                                    <option value="Juli" {{ date(now()->format('m')) == 7 ? 'selected="selected"' : '' }}>Juli</option>
                                                    <option value="Agustus" {{ date(now()->format('m')) == 8 ? 'selected="selected"' : '' }}>Agustus</option>
                                                    <option value="September" {{ date(now()->format('m')) == 9 ? 'selected="selected"' : '' }}>September</option>
                                                    <option value="Oktober" {{ date(now()->format('m')) == 10 ? 'selected="selected"' : '' }}>Oktober</option>
                                                    <option value="November" {{ date(now()->format('m')) == 11 ? 'selected="selected"' : '' }}>November</option>
                                                    <option value="Desember" {{ date(now()->format('m')) == 12 ? 'selected="selected"' : '' }}>Desember</option>
                                                </select>

                                                <select class="form-control" id="jadwaltahun" name="jadwaltahun">
                                                    {{ $tahun = date(now()->format('Y'))+1 }}
                                                    @for($i=$tahun;$i>$tahun - 3;$i--)
                                                    <option value="{{ $i }}" {{ date(now()->format('Y')) == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                
                            </div>
                            <div class="mb-3">
                                @if($reset == 0) 
                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                @else
                                <button type="submit" class="btn btn-primary btn-block">Atur Ulang</button>
                                @endif
                            </div>
                        </div>
               
                    </form> 
                    
                </div>
            </div>
        </div>
    </section>
</div>
@endsection