@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    
                    <form method="POST" action="{{ route('interview.storeschedule', ['id' => $data->id]) }}">
           
                  
                        @csrf          
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Menentukan Jadwal Interview (Reschedule)</strong></h3>
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
                                       
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                    <span class="fas fa-calendar" style="width: 15px"></span>
                                                    </div>
                                                </div>

                                                <select class="form-control" id="jadwalhari" name="jadwalhari">
                                                    @for($i=1;$i<32;$i++)
                                                        <option value="{{ $i }}" {{ $data->jadwalhari == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>

                                                <select class="form-control" id="jadwalbulan" name="jadwalbulan">
                                                    <option value="Januari" {{ $data->jadwalbulan == "Januari" ? 'selected="selected"' : '' }}>Januari</option>
                                                    <option value="Februari" {{ $data->jadwalbulan == "Februari" ? 'selected="selected"' : '' }}>Februari</option>
                                                    <option value="Maret" {{ $data->jadwalbulan == "Maret" ? 'selected="selected"' : '' }}>Maret</option>
                                                    <option value="April" {{ $data->jadwalbulan == "April" ? 'selected="selected"' : '' }}>April</option>
                                                    <option value="Mei" {{ $data->jadwalbulan == "Mei" ? 'selected="selected"' : '' }}>Mei</option>
                                                    <option value="Juni" {{ $data->jadwalbulan == "Juni" ? 'selected="selected"' : '' }}>Juni</option>
                                                    <option value="Juli" {{ $data->jadwalbulan == "Juli" ? 'selected="selected"' : '' }}>Juli</option>
                                                    <option value="Agustus" {{ $data->jadwalbulan == "Agustus" ? 'selected="selected"' : '' }}>Agustus</option>
                                                    <option value="September" {{ $data->jadwalbulan == "September" ? 'selected="selected"' : '' }}>September</option>
                                                    <option value="Oktober" {{ $data->jadwalbulan == "Oktober" ? 'selected="selected"' : '' }}>Oktober</option>
                                                    <option value="November" {{ $data->jadwalbulan == "November" ? 'selected="selected"' : '' }}>November</option>
                                                    <option value="Desember" {{ $data->jadwalbulan == "Desember" ? 'selected="selected"' : '' }}>Desember</option>
                                                </select>

                                                <select class="form-control" id="jadwaltahun" name="jadwaltahun">
                                                    {{ $tahun = date(now()->format('Y'))+1 }}
                                                    @for($i=$tahun;$i>$tahun - 2;$i--)
                                                    <option value="{{ $i }}" {{ $data->jadwaltahun  == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                      
                                    </div>
                                
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Atur Ulang</button>
                           
                            </div>
                        </div>
               
                    </form> 
                    
                </div>
            </div>
        </div>
    </section>
</div>
@endsection