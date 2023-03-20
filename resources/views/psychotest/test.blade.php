@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    
                    <form method="POST" action="{{ route('psychotest.storetest', ['id' => $data->id]) }}">
           
                  
                        @csrf          
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Psikotes</strong></h3>
                                                            
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
                                                    <span style="width: 15px">D</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="disctest" name="disctest" placeholder="Nilai DISC" value="@if($data->disctest != '') {{ Crypt::decryptString($data->disctest) }} @endif">
                                            
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span style="width: 15px">I</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="ist" name="ist" placeholder="Nilai IST" value="@if($data->ist != '') {{ Crypt::decryptString($data->ist) }} @endif">
                                            
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span style="width: 15px">C</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="cfit" name="cfit" placeholder="Nilai CFIT" value="@if($data->cfit != '') {{ Crypt::decryptString($data->cfit) }} @endif">
                                            
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span style="width: 15px">A</span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="armyalpha" name="armyalpha" placeholder="Nilai Army Alpha" value="@if($data->armyalpha != ''){{ Crypt::decryptString($data->armyalpha) }}@endif">
                                            
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span style="width: 15px">P</span>
                                                </div>
                                            </div>
                                            
                                            <input type="text" class="form-control" id="papikostik" name="papikostik" placeholder="Nilai Papikostik" value="@if($data->papikostik != ''){{ Crypt::decryptString($data->papikostik) }}@endif">
                                            
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span style="width: 15px">K</span>
                                                </div>
                                            </div>
                                            
                                            <input type="text" class="form-control" id="kreprlin" name="kreprlin" placeholder="Nilai Kreprlin" value="@if($data->kreprlin != ''){{ Crypt::decryptString($data->kreprlin) }}@endif">
                                            
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