@extends('style.regemp')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('punishments.store') }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Pelanggaran Karyawan</strong></h3>
                            </div>

                            <div class="card-body"> 
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-list-alt" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nomor" id="nomor" name="nomor">
                                    <input type="text" class="form-control"  id="namahari" name="namahari" value="{{ $namahari }}" hidden="hidden">
                                    <input type="text" class="form-control"  id="hari" name="hari" value="{{ date(now()->format('d')) }}" hidden="hidden">
                                    <input type="text" class="form-control"  id="bulan" name="bulan" value="{{ date(now()->format('m')) }}" hidden="hidden">
                                    <input type="text" class="form-control"  id="tahun" name="tahun" value="{{ date(now()->format('y')) }}" hidden="hidden">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-user" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <select class="form-control" id="nik" name="nik">
                                        @foreach ($employee as $item)
                                            <option value="{{ $item->nik }}">{{ $item->nik }} - {{ Crypt::decryptString($item->nama) }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-asterisk" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control"  id="hr" name="hr" value="{{ Auth::user()->name }}" hidden="hidden">
                                    <input type="text" class="form-control"  id="direktur" name="direktur" value="{{ $office->direktur }}" hidden="hidden">
                                    <input type="text" class="form-control"  id="atasan" name="atasan" placeholder="Nama Atasan">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-exclamation" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <select class="form-control" id="jenis" name="jenis">
                                        <option value="SP1">Surat Peringatan ke-1 (SP1)</option>
                                        <option value="SP2">Surat Peringatan ke-2 (SP2)</option>
                                        <option value="SP3">Surat Peringatan ke-3 (SP3)</option>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-edit" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <textarea class="form-control" placeholder="Alasan" id="alasan" name="alasan"></textarea>
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