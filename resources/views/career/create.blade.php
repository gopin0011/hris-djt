@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('careers.store') }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Pengalaman Kerja</strong></h3>
                            </div>
                                <div class="card-body"> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-building" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nama perusahaan" id="perusahaan" name="perusahaan" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-sitemap" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Jabatan" id="jabatan" name="jabatan" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">
                                    </div>

                                    <div class="input-group mb-2">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-map-marker" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Alamat perusahaan" id="alamat" name="alamat" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">
                                    </div>
                                    
                                    <div class="input-group mb-0">
                                        <div class="form-control" style="border: none">
                                            <p>Masuk (Bln/Thn)</p>
                                        </div>
                                        <div class="form-control" style="border: none">
                                            <p>Keluar (Bln/Thn)</p>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">

                                        <select class="form-control" id="bulanmasuk" name="bulanmasuk">
                                            <option value="Januari">1</option>
                                            <option value="Februari">2</option>
                                            <option value="Maret">3</option>
                                            <option value="April">4</option>
                                            <option value="Mei">5</option>
                                            <option value="Juni">6</option>
                                            <option value="Juli">7</option>
                                            <option value="Agustus">8</option>
                                            <option value="September">9</option>
                                            <option value="Oktober">10</option>
                                            <option value="November">11</option>
                                            <option value="Desember">12</option>
                                        </select>
                                        <select class="form-control" id="tahunmasuk" name="tahunmasuk">
                                            {{ $tahun = date(now()->format('Y')) }}
                                            @for($i=$tahun;$i>1900;$i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>

                                        <select class="form-control" id="bulankeluar" name="bulankeluar">
                                            <option value="Januari">1</option>
                                            <option value="Februari">2</option>
                                            <option value="Maret">3</option>
                                            <option value="April">4</option>
                                            <option value="Mei">5</option>
                                            <option value="Juni">6</option>
                                            <option value="Juli">7</option>
                                            <option value="Agustus">8</option>
                                            <option value="September">9</option>
                                            <option value="Oktober">10</option>
                                            <option value="November">11</option>
                                            <option value="Desember">12</option>
                                        </select>
                                        <select class="form-control" id="tahunkeluar" name="tahunkeluar">
                                            {{ $tahun = date(now()->format('Y')) }}
                                            @for($i=$tahun;$i>1900;$i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-money-bill-alt" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Gaji"  id="gaji" name="gaji">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-tasks" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <textarea class="form-control" placeholder="Deskripsi pekerjaan" id="pekerjaan" name="pekerjaan" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')"></textarea>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-crown" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Prestasi" id="prestasi" name="prestasi">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-sticky-note" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Alasan resign" id="alasan" name="alasan">
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