@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    
                    <form method="POST" action="{{ route('interview.storetest', ['id' => $data->id]) }}">
           
                  
                        @csrf          
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Interview</strong></h3>
                                <div class="card-tools">
                                    @if(Auth::user()->admin == 3|| Auth::user()->admin == 2)
                                    <a href="{{ route('prints.appcomp', ['id' => $data->id]) }}" target="_blank" class="btn btn-tool" style="color:rgb(71, 158, 12)">
                                        <strong>LIHAT APLIKASI PELAMAR</strong>
                                    </a>
                                    @else
                                    <a href="{{ route('prints.applicantdev', ['id' => $data->id]) }}" target="_blank" class="btn btn-tool" style="color:rgb(71, 158, 12)">
                                        <strong>LIHAT APLIKASI PELAMAR</strong>
                                    </a>
                                    @endif
                                </div>    
                                      
                                <div class="card-tools" style="margin-right: 10px">
                                    @foreach ($user as $item)
                                    <a href="{{ '/hris/dokumenpelamar/'.$item->key.'/rekrutmen.pdf' }}" target="_blank" class="btn btn-tool" style="color:rgb(11, 149, 241)">
                                        <strong>LIHAT FILE PENDUKUNG</strong>
                                    </a>
                                    @endforeach
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
                                       
                                        @if(Auth::user()->admin == 2 || Auth::user()->admin == 3 )
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-comment" style="width: 15px"></span>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" id="namahr" name="namahr" placeholder="Nama pewawancara (HR)" value="@if($data->namahr != ''){{ Crypt::decryptString($data->namahr) }}@endif">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-edit" style="width: 15px"></span>
                                                    </div>
                                                </div>
                                                <textarea  id="inthr" name="inthr" class="form-control"  placeholder="Hasil interview (HR)">@if($data->inthr != ''){{ Crypt::decryptString($data->inthr) }}@endif</textarea>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-handshake" style="width: 15px"></span>
                                                    </div>
                                                </div>
                                                <select class="form-control" id="hasil" name="hasil">
                                                    <option value="" @if($data->hasil != ''){{ Crypt::decryptString($data->hasil) == "" ? 'selected="selected"' : '' }}@endif>-- Keputusan --</option>
                                                    <option value="Diterima" @if($data->hasil != ''){{ Crypt::decryptString($data->hasil) == "Diterima" ? 'selected="selected"' : '' }}@endif>Pass</option>
                                                    <option value="Hold" @if($data->hasil != ''){{ Crypt::decryptString($data->hasil) == "Hold" ? 'selected="selected"' : '' }}@endif>Keep</option>
                                                    <option value="Tidak Diterima" @if($data->hasil != ''){{ Crypt::decryptString($data->hasil) == "Tidak Diterima" ? 'selected="selected"' : '' }}@endif>Failed</option>
                                                </select>
    
                                                <select class="form-control" id="gabunghari" name="gabunghari">
                                                    <option value="" @if($data->gabunghari != ''){{ Crypt::decryptString($data->gabunghari) == "" ? 'selected="selected"' : '' }}@endif>-- Hari --</option>
                                                    @for($i=1;$i<32;$i++)
                                                        <option value="{{ $i }}" @if($data->gabunghari != ''){{ Crypt::decryptString($data->gabunghari) == "$i" ? 'selected="selected"' : '' }}@endif>{{ $i }}</option>
                                                    @endfor
                                                </select>
    
                                                <select class="form-control" id="gabungbulan" name="gabungbulan">
                                                    <option value="" @if($data->gabungbulan != ''){{ Crypt::decryptString($data->gabungbulan) == "" ? 'selected="selected"' : '' }}@endif>-- Bulan --</option>
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
                                                    <option value="" @if($data->gabungtahun != ''){{ Crypt::decryptString($data->gabungtahun) == "" ? 'selected="selected"' : '' }}@endif>-- Tahun --</option>
                                                    {{ $tahun = date(now()->format('Y')) + 1 }}
                                                    @for($i=$tahun;$i>$tahun - 3;$i--)
                                                    <option value="{{ $i }}" @if($data->gabungtahun != ''){{ Crypt::decryptString($data->gabungtahun)  == "$i" ? 'selected="selected"' : '' }}@endif>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        @endif

                                        @if(Auth::user()->name == "Interviewer User")
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-comment" style="width: 15px"></span>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" id="namauser" name="namauser" placeholder="Nama pewawancara (User) dan jabatan" value="@if($data->namauser != ''){{ Crypt::decryptString($data->namauser) }}@endif">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-edit" style="width: 15px"></span>
                                                    </div>
                                                </div>
                                                <textarea  id="intuser" name="intuser" class="form-control"  placeholder="Hasil interview (User)">@if($data->intuser != ''){{ Crypt::decryptString($data->intuser) }}@endif</textarea>
                                            </div>
                                        @endif

                                        @if(Auth::user()->name == "Interviewer Management")
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-comment" style="width: 15px"></span>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" id="namamana" name="namamana" placeholder="Nama pewawancara (Manajemen)" value="@if($data->namamana != ''){{ Crypt::decryptString($data->namamana) }}@endif">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-edit" style="width: 15px"></span>
                                                    </div>
                                                </div>
                                                <textarea  id="intmana" name="intmana" class="form-control"  placeholder="Hasil interview (Manajemen)">@if($data->intmana != ''){{ Crypt::decryptString($data->intmana) }}@endif</textarea>
                                            </div>
                                        @endif

                                        @if(Auth::user()->name == "Interviewer User" || Auth::user()->admin == 2 || Auth::user()->admin == 3)
                                        
                                        <!--Basic-->
                                            <div class="input-group mb-3">
                                                <label>Basic Competency</label>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        01
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c01" name="c01">
                                                    <option value="0" {{ $x[0] == "0" ? 'selected="selected"' : '' }}>-- Integrity --</option>
                                                    <option value="1" {{ $x[0] == "1" ? 'selected="selected"' : '' }}>Integrity : 1 (rendah)</option>
                                                    <option value="2" {{ $x[0] == "2" ? 'selected="selected"' : '' }}>Integrity : 2 (kurang)</option>
                                                    <option value="3" {{ $x[0] == "3" ? 'selected="selected"' : '' }}>Integrity : 3 (cukup)</option>
                                                    <option value="4" {{ $x[0] == "4" ? 'selected="selected"' : '' }}>Integrity : 4 (baik)</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        02
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c02" name="c02">
                                                    <option value="0" {{ $x[1] == "0" ? 'selected="selected"' : '' }}>-- Innovation --</option>
                                                    <option value="1" {{ $x[1] == "1" ? 'selected="selected"' : '' }}>Innovation : 1 (rendah)</option>
                                                    <option value="2" {{ $x[1] == "2" ? 'selected="selected"' : '' }}>Innovation : 2 (kurang)</option>
                                                    <option value="3" {{ $x[1] == "3" ? 'selected="selected"' : '' }}>Innovation : 3 (cukup)</option>
                                                    <option value="4" {{ $x[1] == "4" ? 'selected="selected"' : '' }}>Innovation : 4 (baik)</option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        03
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c03" name="c03">
                                                    <option value="0" {{ $x[2] == "0" ? 'selected="selected"' : '' }}>-- Continus Improvement --</option>
                                                    <option value="1" {{ $x[2] == "1" ? 'selected="selected"' : '' }}>Continus Improvement : 1 (rendah)</option>
                                                    <option value="2" {{ $x[2] == "2" ? 'selected="selected"' : '' }}>Continus Improvement : 2 (kurang)</option>
                                                    <option value="3" {{ $x[2] == "3" ? 'selected="selected"' : '' }}>Continus Improvement : 3 (cukup)</option>
                                                    <option value="4" {{ $x[2] == "4" ? 'selected="selected"' : '' }}>Continus Improvement : 4 (baik)</option>
                                                </select>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        04
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c04" name="c04">
                                                    <option value="0" {{ $x[3] == "0" ? 'selected="selected"' : '' }}>-- Accountability --</option>
                                                    <option value="1" {{ $x[3] == "1" ? 'selected="selected"' : '' }}>Accountability : 1 (rendah)</option>
                                                    <option value="2" {{ $x[3] == "2" ? 'selected="selected"' : '' }}>Accountability : 2 (kurang)</option>
                                                    <option value="3" {{ $x[3] == "3" ? 'selected="selected"' : '' }}>Accountability : 3 (cukup)</option>
                                                    <option value="4" {{ $x[3] == "4" ? 'selected="selected"' : '' }}>Accountability : 4 (baik)</option>
                                                </select>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        05
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c05" name="c05">
                                                    <option value="0" {{ $x[4] == "0" ? 'selected="selected"' : '' }}>-- Perseverance --</option>
                                                    <option value="1" {{ $x[4] == "1" ? 'selected="selected"' : '' }}>Perseverance : 1 (rendah)</option>
                                                    <option value="2" {{ $x[4] == "2" ? 'selected="selected"' : '' }}>Perseverance : 2 (kurang)</option>
                                                    <option value="3" {{ $x[4] == "3" ? 'selected="selected"' : '' }}>Perseverance : 3 (cukup)</option>
                                                    <option value="4" {{ $x[4] == "4" ? 'selected="selected"' : '' }}>Perseverance : 4 (baik)</option>
                                                </select>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        06
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c06" name="c06">
                                                    <option value="0" {{ $x[5] == "0" ? 'selected="selected"' : '' }}>-- Teamwork --</option>
                                                    <option value="1" {{ $x[5] == "1" ? 'selected="selected"' : '' }}>Teamwork : 1 (rendah)</option>
                                                    <option value="2" {{ $x[5] == "2" ? 'selected="selected"' : '' }}>Teamwork : 2 (kurang)</option>
                                                    <option value="3" {{ $x[5] == "3" ? 'selected="selected"' : '' }}>Teamwork : 3 (cukup)</option>
                                                    <option value="4" {{ $x[5] == "4" ? 'selected="selected"' : '' }}>Teamwork : 4 (baik)</option>
                                                </select>
                                                </select>
                                            </div>
                                        <!--Basic-->
                                        <!--Behavioral-->
                                            <div class="input-group mb-3">
                                                <label>Behavioral Competency</label>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        01
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c07" name="c07">
                                                    <option value="0" {{ $x[6] == "0" ? 'selected="selected"' : '' }}>-- Achievement Orientation --</option>
                                                    <option value="1" {{ $x[6] == "1" ? 'selected="selected"' : '' }}>Achievement Orientation : 1 (rendah)</option>
                                                    <option value="2" {{ $x[6] == "2" ? 'selected="selected"' : '' }}>Achievement Orientation : 2 (kurang)</option>
                                                    <option value="3" {{ $x[6] == "3" ? 'selected="selected"' : '' }}>Achievement Orientation : 3 (cukup)</option>
                                                    <option value="4" {{ $x[6] == "4" ? 'selected="selected"' : '' }}>Achievement Orientation : 4 (baik)</option>
                                                </select>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        02
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c08" name="c08">
                                                    <option value="0" {{ $x[7] == "0" ? 'selected="selected"' : '' }}>-- Impact and Influence --</option>
                                                    <option value="1" {{ $x[7] == "1" ? 'selected="selected"' : '' }}>Impact and Influence : 1 (rendah)</option>
                                                    <option value="2" {{ $x[7] == "2" ? 'selected="selected"' : '' }}>Impact and Influence : 2 (kurang)</option>
                                                    <option value="3" {{ $x[7] == "3" ? 'selected="selected"' : '' }}>Impact and Influence : 3 (cukup)</option>
                                                    <option value="4" {{ $x[7] == "4" ? 'selected="selected"' : '' }}>Impact and Influence : 4 (baik)</option>
                                                </select>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        03
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c09" name="c09">
                                                    <option value="0" {{ $x[8] == "0" ? 'selected="selected"' : '' }}>-- Interpersonal Relationship Building --</option>
                                                    <option value="1" {{ $x[8] == "1" ? 'selected="selected"' : '' }}>Interpersonal Relationship Building : 1 (rendah)</option>
                                                    <option value="2" {{ $x[8] == "2" ? 'selected="selected"' : '' }}>Interpersonal Relationship Building : 2 (kurang)</option>
                                                    <option value="3" {{ $x[8] == "3" ? 'selected="selected"' : '' }}>Interpersonal Relationship Building : 3 (cukup)</option>
                                                    <option value="4" {{ $x[8] == "4" ? 'selected="selected"' : '' }}>Interpersonal Relationship Building : 4 (baik)</option>
                                                </select>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        04
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c10" name="c10">
                                                    <option value="0" {{ $x[9] == "0" ? 'selected="selected"' : '' }}>-- Initiative --</option>
                                                    <option value="1" {{ $x[9] == "1" ? 'selected="selected"' : '' }}>Initiative : 1 (rendah)</option>
                                                    <option value="2" {{ $x[9] == "2" ? 'selected="selected"' : '' }}>Initiative : 2 (kurang)</option>
                                                    <option value="3" {{ $x[9] == "3" ? 'selected="selected"' : '' }}>Initiative : 3 (cukup)</option>
                                                    <option value="4" {{ $x[9] == "4" ? 'selected="selected"' : '' }}>Initiative : 4 (baik)</option>
                                                </select>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        05
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c11" name="c11">
                                                    <option value="0" {{ $x[10] == "0" ? 'selected="selected"' : '' }}>-- Self Control and Confidence --</option>
                                                    <option value="1" {{ $x[10] == "1" ? 'selected="selected"' : '' }}>Self Control and Confidence : 1 (rendah)</option>
                                                    <option value="2" {{ $x[10] == "2" ? 'selected="selected"' : '' }}>Self Control and Confidence : 2 (kurang)</option>
                                                    <option value="3" {{ $x[10] == "3" ? 'selected="selected"' : '' }}>Self Control and Confidence : 3 (cukup)</option>
                                                    <option value="4" {{ $x[10] == "4" ? 'selected="selected"' : '' }}>Self Control and Confidence : 4 (baik)</option>
                                                </select>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        06
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c12" name="c12">
                                                    <option value="0" {{ $x[11] == "0" ? 'selected="selected"' : '' }}>-- Adapting to Change --</option>
                                                    <option value="1" {{ $x[11] == "1" ? 'selected="selected"' : '' }}>Adapting to Change : 1 (rendah)</option>
                                                    <option value="2" {{ $x[11] == "2" ? 'selected="selected"' : '' }}>Adapting to Change : 2 (kurang)</option>
                                                    <option value="3" {{ $x[11] == "3" ? 'selected="selected"' : '' }}>Adapting to Change : 3 (cukup)</option>
                                                    <option value="4" {{ $x[11] == "4" ? 'selected="selected"' : '' }}>Adapting to Change : 4 (baik)</option>
                                                </select>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        07
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c13" name="c13">
                                                    <option value="0" {{ $x[12] == "0" ? 'selected="selected"' : '' }}>-- Conceptual Thinking --</option>
                                                    <option value="1" {{ $x[12] == "1" ? 'selected="selected"' : '' }}>Conceptual Thinking : 1 (rendah)</option>
                                                    <option value="2" {{ $x[12] == "2" ? 'selected="selected"' : '' }}>Conceptual Thinking : 2 (kurang)</option>
                                                    <option value="3" {{ $x[12] == "3" ? 'selected="selected"' : '' }}>Conceptual Thinking : 3 (cukup)</option>
                                                    <option value="4" {{ $x[12] == "4" ? 'selected="selected"' : '' }}>Conceptual Thinking : 4 (baik)</option>
                                                </select>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        08
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c14" name="c14">
                                                    <option value="0" {{ $x[13] == "0" ? 'selected="selected"' : '' }}>-- Analytical Thinking --</option>
                                                    <option value="1" {{ $x[13] == "1" ? 'selected="selected"' : '' }}>Analytical Thinking : 1 (rendah)</option>
                                                    <option value="2" {{ $x[13] == "2" ? 'selected="selected"' : '' }}>Analytical Thinking : 2 (kurang)</option>
                                                    <option value="3" {{ $x[13] == "3" ? 'selected="selected"' : '' }}>Analytical Thinking : 3 (cukup)</option>
                                                    <option value="4" {{ $x[13] == "4" ? 'selected="selected"' : '' }}>Analytical Thinking : 4 (baik)</option>
                                                </select>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        09
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c15" name="c15">
                                                    <option value="0" {{ $x[14] == "0" ? 'selected="selected"' : '' }}>-- Problem Solving --</option>
                                                    <option value="1" {{ $x[14] == "1" ? 'selected="selected"' : '' }}>Problem Solving : 1 (rendah)</option>
                                                    <option value="2" {{ $x[14] == "2" ? 'selected="selected"' : '' }}>Problem Solving : 2 (kurang)</option>
                                                    <option value="3" {{ $x[14] == "3" ? 'selected="selected"' : '' }}>Problem Solving : 3 (cukup)</option>
                                                    <option value="4" {{ $x[14] == "4" ? 'selected="selected"' : '' }}>Problem Solving : 4 (baik)</option>
                                                </select>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        10
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c16" name="c16">
                                                    <option value="0" {{ $x[15] == "0" ? 'selected="selected"' : '' }}>-- Decisive Judging --</option>
                                                    <option value="1" {{ $x[15] == "1" ? 'selected="selected"' : '' }}>Decisive Judging : 1 (rendah)</option>
                                                    <option value="2" {{ $x[15] == "2" ? 'selected="selected"' : '' }}>Decisive Judging : 2 (kurang)</option>
                                                    <option value="3" {{ $x[15] == "3" ? 'selected="selected"' : '' }}>Decisive Judging : 3 (cukup)</option>
                                                    <option value="4" {{ $x[15] == "4" ? 'selected="selected"' : '' }}>Decisive Judging : 4 (baik)</option>
                                                </select>
                                                </select>
                                            </div>
                                        <!--Behavioral-->
                                        <!--Mangerial-->
                                            <div class="input-group mb-3">
                                                <label>Mangerial Competency</label>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        01
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c17" name="c17">
                                                    <option value="0" {{ $x[16] == "0" ? 'selected="selected"' : '' }}>-- Visioning --</option>
                                                    <option value="1" {{ $x[16] == "1" ? 'selected="selected"' : '' }}>Visioning : 1 (rendah)</option>
                                                    <option value="2" {{ $x[16] == "2" ? 'selected="selected"' : '' }}>Visioning : 2 (kurang)</option>
                                                    <option value="3" {{ $x[16] == "3" ? 'selected="selected"' : '' }}>Visioning : 3 (cukup)</option>
                                                    <option value="4" {{ $x[16] == "4" ? 'selected="selected"' : '' }}>Visioning : 4 (baik)</option>
                                                </select>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        02
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c18" name="c18">
                                                    <option value="0" {{ $x[17] == "0" ? 'selected="selected"' : '' }}>-- Team Leadership --</option>
                                                    <option value="1" {{ $x[17] == "1" ? 'selected="selected"' : '' }}>Team Leadership : 1 (rendah)</option>
                                                    <option value="2" {{ $x[17] == "2" ? 'selected="selected"' : '' }}>Team Leadership : 2 (kurang)</option>
                                                    <option value="3" {{ $x[17] == "3" ? 'selected="selected"' : '' }}>Team Leadership : 3 (cukup)</option>
                                                    <option value="4" {{ $x[17] == "4" ? 'selected="selected"' : '' }}>Team Leadership : 4 (baik)</option>
                                                </select>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        03
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c19" name="c19">
                                                    <option value="0" {{ $x[18] == "0" ? 'selected="selected"' : '' }}>-- Managing Others --</option>
                                                    <option value="1" {{ $x[18] == "1" ? 'selected="selected"' : '' }}>Managing Others : 1 (rendah)</option>
                                                    <option value="2" {{ $x[18] == "2" ? 'selected="selected"' : '' }}>Managing Others : 2 (kurang)</option>
                                                    <option value="3" {{ $x[18] == "3" ? 'selected="selected"' : '' }}>Managing Others : 3 (cukup)</option>
                                                    <option value="4" {{ $x[18] == "4" ? 'selected="selected"' : '' }}>Managing Others : 4 (baik)</option>
                                                </select>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        04
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c20" name="c20">
                                                    <option value="0" {{ $x[19] == "0" ? 'selected="selected"' : '' }}>-- Developing Others --</option>
                                                    <option value="1" {{ $x[19] == "1" ? 'selected="selected"' : '' }}>Developing Others : 1 (rendah)</option>
                                                    <option value="2" {{ $x[19] == "2" ? 'selected="selected"' : '' }}>Developing Others : 2 (kurang)</option>
                                                    <option value="3" {{ $x[19] == "3" ? 'selected="selected"' : '' }}>Developing Others : 3 (cukup)</option>
                                                    <option value="4" {{ $x[19] == "4" ? 'selected="selected"' : '' }}>Developing Others : 4 (baik)</option>
                                                </select>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        05
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c21" name="c21">
                                                    <option value="0" {{ $x[20] == "0" ? 'selected="selected"' : '' }}>-- Conflict Management --</option>
                                                    <option value="1" {{ $x[20] == "1" ? 'selected="selected"' : '' }}>Conflict Management : 1 (rendah)</option>
                                                    <option value="2" {{ $x[20] == "2" ? 'selected="selected"' : '' }}>Conflict Management : 2 (kurang)</option>
                                                    <option value="3" {{ $x[20] == "3" ? 'selected="selected"' : '' }}>Conflict Management : 3 (cukup)</option>
                                                    <option value="4" {{ $x[20] == "4" ? 'selected="selected"' : '' }}>Conflict Management : 4 (baik)</option>
                                                </select>
                                                </select>
                                            </div>
                                        <!--Managerial-->
                                        <!--Technical-->
                                            <div class="input-group mb-3">
                                                <label>Technical Competency</label>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        01
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c22" name="c22">
                                                    <option value="0" {{ $x[21] == "0" ? 'selected="selected"' : '' }}>-- Presentation Skill --</option>
                                                    <option value="1" {{ $x[21] == "1" ? 'selected="selected"' : '' }}>Presentation Skill : 1 (rendah)</option>
                                                    <option value="2" {{ $x[21] == "2" ? 'selected="selected"' : '' }}>Presentation Skill : 2 (kurang)</option>
                                                    <option value="3" {{ $x[21] == "3" ? 'selected="selected"' : '' }}>Presentation Skill : 3 (cukup)</option>
                                                    <option value="4" {{ $x[21] == "4" ? 'selected="selected"' : '' }}>Presentation Skill : 4 (baik)</option>
                                                </select>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        02
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c23" name="c23">
                                                    <option value="0" {{ $x[22] == "0" ? 'selected="selected"' : '' }}>-- Negotiation Skill --</option>
                                                    <option value="1" {{ $x[22] == "1" ? 'selected="selected"' : '' }}>Negotiation Skill : 1 (rendah)</option>
                                                    <option value="2" {{ $x[22] == "2" ? 'selected="selected"' : '' }}>Negotiation Skill : 2 (kurang)</option>
                                                    <option value="3" {{ $x[22] == "3" ? 'selected="selected"' : '' }}>Negotiation Skill : 3 (cukup)</option>
                                                    <option value="4" {{ $x[22] == "4" ? 'selected="selected"' : '' }}>Negotiation Skill : 4 (baik)</option>
                                                </select>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        03
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c24" name="c24">
                                                    <option value="0" {{ $x[23] == "0" ? 'selected="selected"' : '' }}>-- Communication Skill --</option>
                                                    <option value="1" {{ $x[23] == "1" ? 'selected="selected"' : '' }}>Communication Skill : 1 (rendah)</option>
                                                    <option value="2" {{ $x[23] == "2" ? 'selected="selected"' : '' }}>Communication Skill : 2 (kurang)</option>
                                                    <option value="3" {{ $x[23] == "3" ? 'selected="selected"' : '' }}>Communication Skill : 3 (cukup)</option>
                                                    <option value="4" {{ $x[23] == "4" ? 'selected="selected"' : '' }}>Communication Skill : 4 (baik)</option>
                                                </select>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        04
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c25" name="c25">
                                                    <option value="0" {{ $x[24] == "0" ? 'selected="selected"' : '' }}>-- Financial Statements --</option>
                                                    <option value="1" {{ $x[24] == "1" ? 'selected="selected"' : '' }}>Financial Statements : 1 (rendah)</option>
                                                    <option value="2" {{ $x[24] == "2" ? 'selected="selected"' : '' }}>Financial Statements : 2 (kurang)</option>
                                                    <option value="3" {{ $x[24] == "3" ? 'selected="selected"' : '' }}>Financial Statements : 3 (cukup)</option>
                                                    <option value="4" {{ $x[24] == "4" ? 'selected="selected"' : '' }}>Financial Statements : 4 (baik)</option>
                                                </select>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        05
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c26" name="c26">
                                                    <option value="0" {{ $x[25] == "0" ? 'selected="selected"' : '' }}>-- Software Design --</option>
                                                    <option value="1" {{ $x[25] == "1" ? 'selected="selected"' : '' }}>Software Design : 1 (rendah)</option>
                                                    <option value="2" {{ $x[25] == "2" ? 'selected="selected"' : '' }}>Software Design : 2 (kurang)</option>
                                                    <option value="3" {{ $x[25] == "3" ? 'selected="selected"' : '' }}>Software Design : 3 (cukup)</option>
                                                    <option value="4" {{ $x[25] == "4" ? 'selected="selected"' : '' }}>Software Design : 4 (baik)</option>
                                                </select>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        06
                                                    </div>
                                                </div>
                                                <select class="form-control" id="c27" name="c27">
                                                    <option value="0" {{ $x[26] == "0" ? 'selected="selected"' : '' }}>-- Software Technics --</option>
                                                    <option value="1" {{ $x[26] == "1" ? 'selected="selected"' : '' }}>Software Technics : 1 (rendah)</option>
                                                    <option value="2" {{ $x[26] == "2" ? 'selected="selected"' : '' }}>Software Technics : 2 (kurang)</option>
                                                    <option value="3" {{ $x[26] == "3" ? 'selected="selected"' : '' }}>Software Technics : 3 (cukup)</option>
                                                    <option value="4" {{ $x[26] == "4" ? 'selected="selected"' : '' }}>Software Technics : 4 (baik)</option>
                                                </select>
                                                </select>
                                            </div>
                                        <!--Technical-->
                                        @endif
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