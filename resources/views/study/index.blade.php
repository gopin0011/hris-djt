@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('studies.update', ['id' => Auth::user()->id]) }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Latar Belakang Pendidikan *</strong></h3>
                            </div>
                                <div class="card-header">
                                    <p style="font-size: 11pt">* Input secara berurutan dari tingkatan yang paling rendah</p>
                                </div>
                            </div>
                           
                            <div class="card-body"> 
                                <div class="card">
                                    <table class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                    <thead>
                                    <tr>
                                        <th>Tingkat</th>
                                        <th>Nama</th>
                                        <th>Kota</th>
                                        <th>Jurusan/Fakultas</th>
                                        <th>Tahun Masuk</th>
                                        <th>Tahun Keluar</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ Crypt::decryptString($item->tingkat) }}</td>
                                            <td>{{ Crypt::decryptString($item->nama) }}</td>
                                            <td>{{ Crypt::decryptString($item->kota) }}</td>
                                            <td>{{ Crypt::decryptString($item->jurfak) }}</td>
                                            <td>{{ Crypt::decryptString($item->masuk) }}</td>
                                            <td>{{ Crypt::decryptString($item->keluar) }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('studies.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
                                                    <span class="fas fa-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <select name="tingkat" class="form-control">
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
                                            </td>
                                            <td><input placeholder="Nama sekolah" name="nama" type="text" class="form-control" required oninvalid="this.setCustomValidity('Nama sekolah harus diisi')" oninput="setCustomValidity('')"></td>
                                            <td><input placeholder="Kota" name="kota" type="text" class="form-control" ></td>
                                            <td><input placeholder="Jurusan/fakultas" name="jurfak" type="text" class="form-control"></td>
                                            <td>
                                                <select class="form-control" id="masuk" name="masuk">
                                                    {{ $tahun = date(now()->format('Y')) }}
                                                    @for($i=$tahun;$i>1900;$i--)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" id="keluar" name="keluar">
                                                    {{ $tahun = date(now()->format('Y')) }}
                                                    @for($i=$tahun;$i>1900;$i--)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </td>
                                            <td style="text-align: center">
                                                <button class="btn btn-primary btn-sm" style="color:white" data-toggle="tooltip" title="Simpan">
                                                    <span class="fas fa-save"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    </table>
                                    <div class="card-body"> 
                                        <a href="{{ route('careers.index') }}" class="btn btn-secondary btn-sm" style="float:left;width:100px">
                                            Kembali
                                        </a>
                                        @if($data->count() != 0)
                                        <a href="{{ route('trainings.index') }}" class="btn btn-primary btn-sm" style="float:right;width:100px">
                                            Lanjutkan
                                        </a>
                                        @endif
                                    </div>
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