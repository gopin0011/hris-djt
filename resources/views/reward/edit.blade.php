@extends('style.regemp')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('rewards.update', ['id' => $data->id]) }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Modifikasi Reward Karyawan</strong></h3>
                            </div>

                            <div class="card-body"> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-user" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" readonly="readonly" value="{{ Crypt::decryptString($data->nama) }}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-id-card" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" readonly="readonly" value="{{ $data->nik }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-address-card" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" readonly="readonly" value="{{ Crypt::decryptString($data->ktp) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span style="width: 65px">5 Tahun</span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Reward 5 Tahun" id="reward5" name="reward5" value="{{ Crypt::decryptString($data->reward5) }}">
                                
                                <select class="form-control" id="hreward5" name="hreward5">
                                    <option value="{{ '' }}" {{ Crypt::decryptString($data->hreward5) == "" ? 'selected="selected"' : '' }}>{{ '' }}</option>
                                    @for($i=1;$i<32;$i++)
                                        <option value="{{ $i }}" {{ Crypt::decryptString($data->hreward5) == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                <select class="form-control" id="breward5" name="breward5">
                                    <option value="{{ '' }}" {{ Crypt::decryptString($data->breward5) == "" ? 'selected="selected"' : '' }}>{{ '' }}</option>
                                    <option value="Januari" {{ Crypt::decryptString($data->breward5) == "Januari" ? 'selected="selected"' : '' }}>Jan</option>
                                    <option value="Februari" {{ Crypt::decryptString($data->breward5) == "Februari" ? 'selected="selected"' : '' }}>Feb</option>
                                    <option value="Maret" {{ Crypt::decryptString($data->breward5) == "Maret" ? 'selected="selected"' : '' }}>Mar</option>
                                    <option value="April" {{ Crypt::decryptString($data->breward5) == "April" ? 'selected="selected"' : '' }}>Apr</option>
                                    <option value="Mei" {{ Crypt::decryptString($data->breward5) == "Mei" ? 'selected="selected"' : '' }}>Mei</option>
                                    <option value="Juni" {{ Crypt::decryptString($data->breward5) == "Juni" ? 'selected="selected"' : '' }}>Jun</option>
                                    <option value="Juli" {{ Crypt::decryptString($data->breward5) == "Juli" ? 'selected="selected"' : '' }}>Jul</option>
                                    <option value="Agustus" {{ Crypt::decryptString($data->breward5) == "Agustus" ? 'selected="selected"' : '' }}>Agu</option>
                                    <option value="September" {{ Crypt::decryptString($data->breward5) == "September" ? 'selected="selected"' : '' }}>Sep</option>
                                    <option value="Oktober" {{ Crypt::decryptString($data->breward5) == "Oktober" ? 'selected="selected"' : '' }}>Okt</option>
                                    <option value="November" {{ Crypt::decryptString($data->breward5) == "November" ? 'selected="selected"' : '' }}>Nov</option>
                                    <option value="Desember" {{ Crypt::decryptString($data->breward5) == "Desember" ? 'selected="selected"' : '' }}>Des</option>
                                </select>
                                <select class="form-control" id="threward5" name="threward5">
                                    {{ $tahun = date(now()->format('Y')) }}
                                    <option value="{{ '' }}" {{ Crypt::decryptString($data->threward5) == "" ? 'selected="selected"' : '' }}>{{ '' }}</option>
                                    @for($i=$tahun;$i>2000;$i--)
                                        <option value="{{ $i }}" {{ Crypt::decryptString($data->threward5)  == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span style="width: 65px">10 Tahun</span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Reward 10 Tahun" id="reward10" name="reward10" value="{{ Crypt::decryptString($data->reward10) }}">
                                
                                <select class="form-control" id="hreward10" name="hreward10">
                                    <option value="{{ '' }}" {{ Crypt::decryptString($data->hreward10) == "" ? 'selected="selected"' : '' }}>{{ '' }}</option>
                                    @for($i=1;$i<32;$i++)
                                        <option value="{{ $i }}" {{ Crypt::decryptString($data->hreward10) == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                <select class="form-control" id="breward10" name="breward10">
                                    <option value="{{ '' }}" {{ Crypt::decryptString($data->breward10) == "" ? 'selected="selected"' : '' }}>{{ '' }}</option>
                                    <option value="Januari" {{ Crypt::decryptString($data->breward10) == "Januari" ? 'selected="selected"' : '' }}>Jan</option>
                                    <option value="Februari" {{ Crypt::decryptString($data->breward10) == "Februari" ? 'selected="selected"' : '' }}>Feb</option>
                                    <option value="Maret" {{ Crypt::decryptString($data->breward10) == "Maret" ? 'selected="selected"' : '' }}>Mar</option>
                                    <option value="April" {{ Crypt::decryptString($data->breward10) == "April" ? 'selected="selected"' : '' }}>Apr</option>
                                    <option value="Mei" {{ Crypt::decryptString($data->breward10) == "Mei" ? 'selected="selected"' : '' }}>Mei</option>
                                    <option value="Juni" {{ Crypt::decryptString($data->breward10) == "Juni" ? 'selected="selected"' : '' }}>Jun</option>
                                    <option value="Juli" {{ Crypt::decryptString($data->breward10) == "Juli" ? 'selected="selected"' : '' }}>Jul</option>
                                    <option value="Agustus" {{ Crypt::decryptString($data->breward10) == "Agustus" ? 'selected="selected"' : '' }}>Agu</option>
                                    <option value="September" {{ Crypt::decryptString($data->breward10) == "September" ? 'selected="selected"' : '' }}>Sep</option>
                                    <option value="Oktober" {{ Crypt::decryptString($data->breward10) == "Oktober" ? 'selected="selected"' : '' }}>Okt</option>
                                    <option value="November" {{ Crypt::decryptString($data->breward10) == "November" ? 'selected="selected"' : '' }}>Nov</option>
                                    <option value="Desember" {{ Crypt::decryptString($data->breward10) == "Desember" ? 'selected="selected"' : '' }}>Des</option>
                                </select>
                                <select class="form-control" id="threward10" name="threward10">
                                    {{ $tahun = date(now()->format('Y')) }}
                                    <option value="{{ '' }}" {{ Crypt::decryptString($data->threward10) == "" ? 'selected="selected"' : '' }}>{{ '' }}</option>
                                    @for($i=$tahun;$i>2000;$i--)
                                        <option value="{{ $i }}" {{ Crypt::decryptString($data->threward10)  == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span style="width: 65px">15 Tahun</span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Reward 10 Tahun" id="reward15" name="reward15" value="{{ Crypt::decryptString($data->reward15) }}">
                                
                                <select class="form-control" id="hreward15" name="hreward15">
                                    <option value="{{ '' }}" {{ Crypt::decryptString($data->hreward15) == "" ? 'selected="selected"' : '' }}>{{ '' }}</option>
                                    @for($i=1;$i<32;$i++)
                                        <option value="{{ $i }}" {{ Crypt::decryptString($data->hreward15) == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                <select class="form-control" id="breward15" name="breward15">
                                    <option value="{{ '' }}" {{ Crypt::decryptString($data->breward15) == "" ? 'selected="selected"' : '' }}>{{ '' }}</option>
                                    <option value="Januari" {{ Crypt::decryptString($data->breward15) == "Januari" ? 'selected="selected"' : '' }}>Jan</option>
                                    <option value="Februari" {{ Crypt::decryptString($data->breward15) == "Februari" ? 'selected="selected"' : '' }}>Feb</option>
                                    <option value="Maret" {{ Crypt::decryptString($data->breward15) == "Maret" ? 'selected="selected"' : '' }}>Mar</option>
                                    <option value="April" {{ Crypt::decryptString($data->breward15) == "April" ? 'selected="selected"' : '' }}>Apr</option>
                                    <option value="Mei" {{ Crypt::decryptString($data->breward15) == "Mei" ? 'selected="selected"' : '' }}>Mei</option>
                                    <option value="Juni" {{ Crypt::decryptString($data->breward15) == "Juni" ? 'selected="selected"' : '' }}>Jun</option>
                                    <option value="Juli" {{ Crypt::decryptString($data->breward15) == "Juli" ? 'selected="selected"' : '' }}>Jul</option>
                                    <option value="Agustus" {{ Crypt::decryptString($data->breward15) == "Agustus" ? 'selected="selected"' : '' }}>Agu</option>
                                    <option value="September" {{ Crypt::decryptString($data->breward15) == "September" ? 'selected="selected"' : '' }}>Sep</option>
                                    <option value="Oktober" {{ Crypt::decryptString($data->breward15) == "Oktober" ? 'selected="selected"' : '' }}>Okt</option>
                                    <option value="November" {{ Crypt::decryptString($data->breward15) == "November" ? 'selected="selected"' : '' }}>Nov</option>
                                    <option value="Desember" {{ Crypt::decryptString($data->breward15) == "Desember" ? 'selected="selected"' : '' }}>Des</option>
                                </select>
                                <select class="form-control" id="threward15" name="threward15">
                                    {{ $tahun = date(now()->format('Y')) }}
                                    <option value="{{ '' }}" {{ Crypt::decryptString($data->threward15) == "" ? 'selected="selected"' : '' }}>{{ '' }}</option>
                                    @for($i=$tahun;$i>2000;$i--)
                                        <option value="{{ $i }}" {{ Crypt::decryptString($data->threward15)  == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
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