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
                           
                            <div class="card-body"> 
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nama panggilan" name="panggilan" id="panggilan" required oninvalid="this.setCustomValidity('Nama panggilan harus diisi')" oninput="setCustomValidity('')">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="NIK" name="nik" id="nik" required oninvalid="this.setCustomValidity('NIK harus diisi')" oninput="setCustomValidity('')">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-address-card"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nomor kontak" name="kontak" id="kontak" required oninvalid="this.setCustomValidity('Nomor kontak harus diisi')" oninput="setCustomValidity('')">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Tempat lahir" name="tempatlahir" id="tempatlahir" required oninvalid="this.setCustomValidity('Tempat lahir harus diisi')" oninput="setCustomValidity('')">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-map-marker"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <select class="form-control" id="hari" name="hari">
                                        @for($i=1;$i<32;$i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select class="form-control" id="bulan" name="bulan">
                                        <option value="Januari">Jan</option>
                                        <option value="Februari">Feb</option>
                                        <option value="Maret">Mar</option>
                                        <option value="April">Apr</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Jun</option>
                                        <option value="Juli">Jul</option>
                                        <option value="Agustus">Agu</option>
                                        <option value="September">Sep</option>
                                        <option value="Oktober">Okt</option>
                                        <option value="November">Nov</option>
                                        <option value="Desember">Des</option>
                                    </select>
                                    <select class="form-control" id="tahun" name="tahun">
                                        {{ $tahun = date(now()->format('Y')) }}
                                        @for($i=$tahun;$i>1900;$i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
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
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-venus-mars"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <select class="form-control" id="warganegara" name="warganegara">
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-globe"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="input-group mb-3">
                                    <select class="form-control" id="agama" name="agama">
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Kong Hu Cu">Kong Hu Cu</option>
                                        <option value="Aliran Kepercayaan">Aliran Kepercayaan</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-certificate"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="input-group mb-3">
                                    <select class="form-control" id="status" name="status">
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Bercerai">Bercerai</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="input-group mb-3">
                                    <select class="form-control" id="darah" name="darah">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-plus-circle"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <textarea class="form-control" placeholder="Alamat" name="alamat" id="alamat" required oninvalid="this.setCustomValidity('Alamat harus diisi')" oninput="setCustomValidity('')"></textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-location-arrow"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <textarea class="form-control" placeholder="Alamat domisili" name="domisili" id="domisili" required oninvalid="this.setCustomValidity('Alamat domisili harus diisi')" oninput="setCustomValidity('')"></textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-location-arrow"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <select class="form-control" id="tingkat" name="tingkat">
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA/SMK</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="D4">D4</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="Sekolah terakhir" name="sekolah" id="sekolah">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-school"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Posisi terakhir" name="posisi" id="posisi">
                                    <input type="text" class="form-control" placeholder="Perusahaan" name="perusahaan" id="perusahaan">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-building"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Referensi" name="referensi" id="referensi">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-user-tie"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Hobi" name="hobi" id="hobi">
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
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
