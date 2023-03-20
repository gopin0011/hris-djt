@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('profiles.store') }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Identitas Diri</strong> * wajib diisi</h3>
                            </div>
                            @foreach ($detaildata as $item)         
                            <div class="card-body"> 
                                <div class="input-group mb-3">
                                    <input @if($item->panggilan != '')value ="{{ Crypt::decryptString($item->panggilan) }}"@endif type="text" class="form-control" placeholder="Nama panggilan" name="panggilan" id="panggilan" required oninvalid="this.setCustomValidity('Nama panggilan harus diisi')" oninput="setCustomValidity('')">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input @if($item->nik != '')value ="{{ Crypt::decryptString($item->nik) }}"@endif type="text" class="form-control" placeholder="NIK" name="nik" id="nik" required oninvalid="this.setCustomValidity('NIK harus diisi')" oninput="setCustomValidity('')">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-address-card"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input value ="{{ Crypt::decryptString( $item->kontak) }}" type="text" class="form-control" placeholder="Nomor kontak" name="kontak" id="kontak" required oninvalid="this.setCustomValidity('Nomor kontak harus diisi')" oninput="setCustomValidity('')">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input value ="{{ Crypt::decryptString( $item->tempatlahir) }}" type="text" class="form-control" placeholder="Tempat lahir" name="tempatlahir" id="tempatlahir" required oninvalid="this.setCustomValidity('Tempat lahir harus diisi')" oninput="setCustomValidity('')">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-map-marker"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <select class="form-control" id="hari" name="hari">
                                        @for($i=1;$i<32;$i++)
                                            <option value="{{ $i }}" {{ Crypt::decryptString($item->hari) == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select class="form-control" id="bulan" name="bulan">
                                        <option value="Januari" {{ Crypt::decryptString($item->bulan) == "Januari" ? 'selected="selected"' : '' }}>Jan</option>
                                        <option value="Februari" {{ Crypt::decryptString($item->bulan) == "Februari" ? 'selected="selected"' : '' }}>Feb</option>
                                        <option value="Maret" {{ Crypt::decryptString($item->bulan) == "Maret" ? 'selected="selected"' : '' }}>Mar</option>
                                        <option value="April" {{ Crypt::decryptString($item->bulan) == "April" ? 'selected="selected"' : '' }}>Apr</option>
                                        <option value="Mei" {{ Crypt::decryptString($item->bulan) == "Mei" ? 'selected="selected"' : '' }}>Mei</option>
                                        <option value="Juni" {{ Crypt::decryptString($item->bulan) == "Juni" ? 'selected="selected"' : '' }}>Jun</option>
                                        <option value="Juli" {{ Crypt::decryptString($item->bulan) == "Juli" ? 'selected="selected"' : '' }}>Jul</option>
                                        <option value="Agustus" {{ Crypt::decryptString($item->bulan) == "Agustus" ? 'selected="selected"' : '' }}>Agu</option>
                                        <option value="September" {{ Crypt::decryptString($item->bulan) == "September" ? 'selected="selected"' : '' }}>Sep</option>
                                        <option value="Oktober" {{ Crypt::decryptString($item->bulan) == "Oktober" ? 'selected="selected"' : '' }}>Okt</option>
                                        <option value="November" {{ Crypt::decryptString($item->bulan) == "November" ? 'selected="selected"' : '' }}>Nov</option>
                                        <option value="Desember" {{ Crypt::decryptString($item->bulan) == "Desember" ? 'selected="selected"' : '' }}>Des</option>
                                    </select>
                                    <select class="form-control" id="tahun" name="tahun">
                                        {{ $tahun = date(now()->format('Y')) }}
                                        @for($i=$tahun;$i>1900;$i--)
                                            <option value="{{ $i }}" {{ Crypt::decryptString($item->tahun)  == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="Pria" {{ Crypt::decryptString($item->gender)  == "Pria" ? 'selected="selected"' : '' }}>Pria</option>
                                        <option value="Wanita" {{ Crypt::decryptString($item->gender)  == "Wanita" ? 'selected="selected"' : '' }}>Wanita</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-venus-mars"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <select class="form-control" id="warganegara" name="warganegara">
                                        <option value="WNI" {{ Crypt::decryptString($item->warganegara) == 'WNI' ? 'selected="selected"' : '' }}>WNI</option>
                                        <option value="WNA" {{ Crypt::decryptString($item->warganegara) == 'WNA' ? 'selected="selected"' : '' }}>WNA</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-globe"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="input-group mb-3">
                                    <select class="form-control" id="agama" name="agama">
                                        <option value="Islam" {{ Crypt::decryptString($item->agama) == 'Islam' ? 'selected="selected"' : '' }}>Islam</option>
                                        <option value="Katolik" {{ Crypt::decryptString($item->agama) == 'Katolik' ? 'selected="selected"' : '' }}>Katolik</option>
                                        <option value="Protestan" {{ Crypt::decryptString($item->agama) == 'Protestan' ? 'selected="selected"' : '' }}>Protestan</option>
                                        <option value="Hindu" {{ Crypt::decryptString($item->agama) == 'Hindu' ? 'selected="selected"' : '' }}>Hindu</option>
                                        <option value="Budha" {{ Crypt::decryptString($item->agama) == 'Budha' ? 'selected="selected"' : '' }}>Budha</option>
                                        <option value="Kong Hu Cu" {{ Crypt::decryptString($item->agama) == 'Kong Hu Cu' ? 'selected="selected"' : '' }}>Kong Hu Cu</option>
                                        <option value="Aliran Kepercayaan" {{ Crypt::decryptString($item->agama) == 'Aliran Kepercayaan' ? 'selected="selected"' : '' }}>Aliran Kepercayaan</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-certificate"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="input-group mb-3">
                                    <select class="form-control" id="status" name="status">
                                        <option value="Belum Menikah" {{ Crypt::decryptString($item->status) == 'Belum Menikah' ? 'selected="selected"' : '' }}>Belum Menikah</option>
                                        <option value="Menikah" {{ Crypt::decryptString($item->status) == 'Menikah' ? 'selected="selected"' : '' }}>Menikah</option>
                                        <option value="Bercerai" {{ Crypt::decryptString($item->status) == 'Bercerai' ? 'selected="selected"' : '' }}>Bercerai</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="input-group mb-3">
                                    <select class="form-control" id="darah" name="darah">
                                        <option value="A" {{ Crypt::decryptString($item->darah) == 'A' ? 'selected="selected"' : '' }}>A</option>
                                        <option value="B" {{ Crypt::decryptString($item->darah) == 'B' ? 'selected="selected"' : '' }}>B</option>
                                        <option value="AB" {{ Crypt::decryptString($item->darah) == 'AB' ? 'selected="selected"' : '' }}>AB</option>
                                        <option value="O" {{ Crypt::decryptString($item->darah) == 'O' ? 'selected="selected"' : '' }}>O</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-plus-circle"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <textarea class="form-control" placeholder="Alamat" name="alamat" id="alamat" required oninvalid="this.setCustomValidity('Alamat harus diisi')" oninput="setCustomValidity('')">{{ Crypt::decryptString( $item->alamat) }}</textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-location-arrow"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <textarea class="form-control" placeholder="Alamat domisili" name="domisili" id="domisili" required oninvalid="this.setCustomValidity('Alamat domisili harus diisi')" oninput="setCustomValidity('')">{{ Crypt::decryptString( $item->domisili) }}</textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-location-arrow"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <select class="form-control" id="tingkat" name="tingkat">
                                        <option value="SD" {{ Crypt::decryptString($item->tingkat) == 'SD' ? 'selected="selected"' : '' }}>SD</option>
                                        <option value="SMP" {{ Crypt::decryptString($item->tingkat) == 'SMP' ? 'selected="selected"' : '' }}>SMP</option>
                                        <option value="SMA" {{ Crypt::decryptString($item->tingkat) == 'SMA' ? 'selected="selected"' : '' }}>SMA/SMK</option>
                                        <option value="D1" {{ Crypt::decryptString($item->tingkat) == 'D1' ? 'selected="selected"' : '' }}>D1</option>
                                        <option value="D2" {{ Crypt::decryptString($item->tingkat) == 'D2' ? 'selected="selected"' : '' }}>D2</option>
                                        <option value="D3" {{ Crypt::decryptString($item->tingkat) == 'D3' ? 'selected="selected"' : '' }}>D3</option>
                                        <option value="D4" {{ Crypt::decryptString($item->tingkat) == 'D4' ? 'selected="selected"' : '' }}>D4</option>
                                        <option value="S1" {{ Crypt::decryptString($item->tingkat) == 'S1' ? 'selected="selected"' : '' }}>S1</option>
                                        <option value="S2" {{ Crypt::decryptString($item->tingkat) == 'S2' ? 'selected="selected"' : '' }}>S2</option>
                                        <option value="S3" {{ Crypt::decryptString($item->tingkat) == 'S3' ? 'selected="selected"' : '' }}>S3</option>
                                    </select>
                                    <input value ="{{ Crypt::decryptString( $item->sekolah) }}" type="text" class="form-control" placeholder="Sekolah terakhir" name="sekolah" id="sekolah">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-school"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input value ="{{ Crypt::decryptString( $item->posisi) }}" type="text" class="form-control" placeholder="Posisi terakhir" name="posisi" id="posisi">
                                    <input value ="{{ Crypt::decryptString( $item->perusahaan) }}" type="text" class="form-control" placeholder="Perusahaan" name="perusahaan" id="perusahaan">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-building"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input value ="{{ Crypt::decryptString( $item->referensi) }}" type="text" class="form-control" placeholder="Referensi" name="referensi" id="referensi">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-user-tie"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input value ="{{ Crypt::decryptString( $item->hobi) }}" type="text" class="form-control" placeholder="Hobi" name="hobi" id="hobi">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-gamepad"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                </div>

                                <div class="card-body"> 
                                    <a href="{{ route('applications.index') }}" class="btn btn-secondary btn-sm" style="float:left;width:100px">
                                        Kembali
                                    </a>
                                   
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
