@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    
                    <form method="POST" action="{{ route('results.store', ['id' => $data->id]) }}">
           
                  
                        @csrf          
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Hasil Akhir Interview</strong></h3>
                                <div class="card-tools">
                                <a href="{{  route('prints.appcomp', ['id' => $data->id])  }}" target="_blank" class="btn btn-tool" style="color:rgb(11, 149, 241)">
                                    <strong>LIHAT APLIKASI PELAMAR</strong>
                                </a>
                                </div>                               
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
                                          
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span style="width: 15px">2</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" readonly="readonly" value="@if($data->posisialt != ''){{ Crypt::decryptString($data->posisialt) }}@endif" placeholder="Loker alternatif tidak diisi">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-handshake" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <select class="form-control" id="hasil" name="hasil">
                                                <option value="Diterima" @if($data->hasil != ''){{ Crypt::decryptString($data->hasil) == "Diterima" ? 'selected="selected"' : '' }}@endif>Diterima</option>
                                                <option value="Hold" @if($data->hasil != ''){{ Crypt::decryptString($data->hasil) == "Hold" ? 'selected="selected"' : '' }}@endif>Hold</option>
                                                <option value="Tidak Diterima" @if($data->hasil != ''){{ Crypt::decryptString($data->hasil) == "Tidak Diterima" ? 'selected="selected"' : '' }}@endif>Tidak Diterima</option>
                                            </select>

                                            <select class="form-control" id="gabunghari" name="gabunghari">
                                                @for($i=1;$i<32;$i++)
                                                    <option value="{{ $i }}" @if($data->gabunghari != ''){{ Crypt::decryptString($data->gabunghari) == "$i" ? 'selected="selected"' : '' }}@endif>{{ $i }}</option>
                                                @endfor
                                            </select>

                                            <select class="form-control" id="gabungbulan" name="gabungbulan">
                                                <option value="Januari" @if($data->gabungbulan != ''){{ Crypt::decryptString($data->gabungbulan) == "Januari" ? 'selected="selected"' : '' }}@endif>Januari</option>
                                                <option value="Februari" @if($data->gabungbulan != ''){{ Crypt::decryptString($data->gabungbulan) == "Februari" ? 'selected="selected"' : '' }}@endif>Februari</option>
                                                <option value="Maret" @if($data->gabungbulan != ''){{ Crypt::decryptString($data->gabungbulan) == "Maret" ? 'selected="selected"' : '' }}@endif>Maret</option>
                                                <option value="April" @if($data->gabungbulan != ''){{ Crypt::decryptString($data->gabungbulan) == "April" ? 'selected="selected"' : '' }}@endif>April</option>
                                                <option value="Mei" @if($data->gabungbulan != ''){{ Crypt::decryptString($data->gabungbulan) == "Mei" ? 'selected="selected"' : '' }}@endif>Mei</option>
                                                <option value="Juni" @if($data->gabungbulan != ''){{ Crypt::decryptString($data->gabungbulan) == "Juni" ? 'selected="selected"' : '' }}@endif>Juni</option>
                                                <option value="Juli" @if($data->gabungbulan != ''){{ Crypt::decryptString($data->gabungbulan) == "Juli" ? 'selected="selected"' : '' }}@endif>Juli</option>
                                                <option value="Agustus" @if($data->gabungbulan != ''){{ Crypt::decryptString($data->gabungbulan) == "Agustus" ? 'selected="selected"' : '' }}@endif>Agustus</option>
                                                <option value="September" @if($data->gabungbulan != ''){{ Crypt::decryptString($data->gabungbulan) == "September" ? 'selected="selected"' : '' }}@endif>September</option>
                                                <option value="Oktober" @if($data->gabungbulan != ''){{ Crypt::decryptString($data->gabungbulan) == "Oktober" ? 'selected="selected"' : '' }}@endif>Oktober</option>
                                                <option value="November" @if($data->gabungbulan != ''){{ Crypt::decryptString($data->gabungbulan) == "November" ? 'selected="selected"' : '' }}@endif>November</option>
                                                <option value="Desember" @if($data->gabungbulan != ''){{ Crypt::decryptString($data->gabungbulan) == "Desember" ? 'selected="selected"' : '' }}@endif>Desember</option>
                                            </select>

                                            <select class="form-control" id="gabungtahun" name="gabungtahun">
                                                {{ $tahun = date(now()->format('Y')) + 1 }}
                                                @for($i=$tahun;$i>$tahun - 3;$i--)
                                                <option value="{{ $i }}" @if($data->gabungtahun != ''){{ Crypt::decryptString($data->gabungtahun)  == "$i" ? 'selected="selected"' : '' }}@endif>{{ $i }}</option>
                                                @endfor
                                            </select>
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