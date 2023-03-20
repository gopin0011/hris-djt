@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('careers.update', ['id' => $data->id]) }}">
                        @csrf      
 
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Pengalaman Kerja</strong></h3>
                            </div>
                                <div class="card-body"> 
                                    <div hidden>
                                        <input name="usid" value="{{ $data->user_id }}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-building" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nama perusahaan" id="perusahaan" name="perusahaan" value="{{ Crypt::decryptString($data->perusahaan) }}" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-sitemap" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Jabatan" id="jabatan" name="jabatan" value="{{ Crypt::decryptString($data->jabatan) }}" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">
                                    </div>

                                    <div class="input-group mb-2">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-map-marker" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Alamat perusahaan" id="alamat" name="alamat" value="{{ Crypt::decryptString($data->alamat) }}" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">
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
                                            <option value="Januari" {{ Crypt::decryptString($data->bulanmasuk) == "Januari" ? 'selected="selected"' : '' }}>1</option>
                                            <option value="Februari" {{ Crypt::decryptString($data->bulanmasuk) == "Februari" ? 'selected="selected"' : '' }}>2</option>
                                            <option value="Maret" {{ Crypt::decryptString($data->bulanmasuk) == "Maret" ? 'selected="selected"' : '' }}>3</option>
                                            <option value="April" {{ Crypt::decryptString($data->bulanmasuk) == "April" ? 'selected="selected"' : '' }}>4</option>
                                            <option value="Mei" {{ Crypt::decryptString($data->bulanmasuk) == "Mei" ? 'selected="selected"' : '' }}>5</option>
                                            <option value="Juni" {{ Crypt::decryptString($data->bulanmasuk) == "Juni" ? 'selected="selected"' : '' }}>6</option>
                                            <option value="Juli" {{ Crypt::decryptString($data->bulanmasuk) == "Juli" ? 'selected="selected"' : '' }}>7</option>
                                            <option value="Agustus" {{ Crypt::decryptString($data->bulanmasuk) == "Agustus" ? 'selected="selected"' : '' }}>8</option>
                                            <option value="September" {{ Crypt::decryptString($data->bulanmasuk) == "September" ? 'selected="selected"' : '' }}>9</option>
                                            <option value="Oktober" {{ Crypt::decryptString($data->bulanmasuk) == "Oktober" ? 'selected="selected"' : '' }}>10</option>
                                            <option value="November" {{ Crypt::decryptString($data->bulanmasuk) == "November" ? 'selected="selected"' : '' }}>11</option>
                                            <option value="Desember" {{ Crypt::decryptString($data->bulanmasuk) == "Desember" ? 'selected="selected"' : '' }}>12</option>
                                        </select>
                                        <select class="form-control" id="tahunmasuk" name="tahunmasuk">
                                            {{ $tahun = date(now()->format('Y')) }}
                                            @for($i=$tahun;$i>1900;$i--)
                                                <option value="{{ $i }}" {{ Crypt::decryptString($data->tahunmasuk)  == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>

                                        <select class="form-control" id="bulankeluar" name="bulankeluar">
                                            <option value="Januari" {{ Crypt::decryptString($data->bulankeluar) == "Januari" ? 'selected="selected"' : '' }}>1</option>
                                            <option value="Februari" {{ Crypt::decryptString($data->bulankeluar) == "Februari" ? 'selected="selected"' : '' }}>2</option>
                                            <option value="Maret" {{ Crypt::decryptString($data->bulankeluar) == "Maret" ? 'selected="selected"' : '' }}>3</option>
                                            <option value="April" {{ Crypt::decryptString($data->bulankeluar) == "April" ? 'selected="selected"' : '' }}>4</option>
                                            <option value="Mei" {{ Crypt::decryptString($data->bulankeluar) == "Mei" ? 'selected="selected"' : '' }}>5</option>
                                            <option value="Juni" {{ Crypt::decryptString($data->bulankeluar) == "Juni" ? 'selected="selected"' : '' }}>6</option>
                                            <option value="Juli" {{ Crypt::decryptString($data->bulankeluar) == "Juli" ? 'selected="selected"' : '' }}>7</option>
                                            <option value="Agustus" {{ Crypt::decryptString($data->bulankeluar) == "Agustus" ? 'selected="selected"' : '' }}>8</option>
                                            <option value="September" {{ Crypt::decryptString($data->bulankeluar) == "September" ? 'selected="selected"' : '' }}>9</option>
                                            <option value="Oktober" {{ Crypt::decryptString($data->bulankeluar) == "Oktober" ? 'selected="selected"' : '' }}>10</option>
                                            <option value="November" {{ Crypt::decryptString($data->bulankeluar) == "November" ? 'selected="selected"' : '' }}>11</option>
                                            <option value="Desember" {{ Crypt::decryptString($data->bulankeluar) == "Desember" ? 'selected="selected"' : '' }}>12</option>
                                        </select>
                                        <select class="form-control" id="tahunkeluar" name="tahunkeluar">
                                            {{ $tahun = date(now()->format('Y')) }}
                                            @for($i=$tahun;$i>1900;$i--)
                                                <option value="{{ $i }}" {{ Crypt::decryptString($data->tahunkeluar)  == "$i" ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-money-bill-alt" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Gaji"  id="gaji" name="gaji" value="{{ Crypt::decryptString($data->gaji) }}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-tasks" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <textarea class="form-control" placeholder="Deskripsi pekerjaan" id="pekerjaan" name="pekerjaan" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">{{ Crypt::decryptString($data->pekerjaan) }}</textarea>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-crown" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Prestasi" id="prestasi" name="prestasi" value="{{ Crypt::decryptString($data->prestasi) }}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-sticky-note" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Alasan resign" id="alasan" name="alasan" value="{{ Crypt::decryptString($data->alasan) }}">
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