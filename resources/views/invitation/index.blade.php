@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">     
                    <form method="POST" action="{{ route('invitations.update') }}">
                        @csrf     
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Undang Pelamar</strong></h3>
                                <a href="{{ route('interview.schedule') }}" class="btn btn-primary btn-sm" style="float: right;width: 120px;margin:5px">
                                    Reschedule
                                </a> 
                            </div>   
                            <table>
                                <tr>
                                    <td><input name="nama" placeholder="Nama pelamar" type="text" class="form-control" required oninvalid="this.setCustomValidity('Nama pelamar harus diisi')" oninput="setCustomValidity('')"></td>
                                    <td><input name="email" placeholder="Email pelamar" type="text" class="form-control" required oninvalid="this.setCustomValidity('Email pelamar harus diisi')" oninput="setCustomValidity('')"></td>
                                    <td>
                                        <select class="form-control" id="jenis" name="jenis">
                                            <option value="Online">Online</option>
                                            <option value="Offline">Offline</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" id="posisi" name="posisi">
                                            @foreach ($vacancy as $vac)
                                                <option value="{{ $vac->nama }}">{{ $vac->nama }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" id="namahari" name="namahari">
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                            <option value="Sabtu">Sabtu</option>
                                            <option value="Minggu">Minggu</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" id="hari" name="hari">
                                            @for($i=1;$i<32;$i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td>
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
                                    </td>
                                    <td>
                                        <select class="form-control" id="tahun" name="tahun">
                                            {{ $tahun = date(now()->format('Y'))+1 }}
                                            @for($i=$tahun;$i>$tahun - 3;$i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td style="width:100px"><input name="jam" placeholder="Jam" type="text" class="form-control" required oninvalid="this.setCustomValidity('Waktu harus diisi')" oninput="setCustomValidity('')"></td>
                                    <td hidden><input name="pic" value="{{ Auth::user()->name }}" type="text" class="form-control" readonly="true"></td>
                                    <td style="text-align: center">
                                        <button class="btn btn-primary btn-sm" style="color:white" data-toggle="tooltip" title="Simpan">
                                            <span class="fas fa-save"></span>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                            <div class="card-body"> 
                                <div class="card">
                                    <table id="example8" class="table table-bordered table-striped table-responsive w-100 d-block">

                                        <thead>
                                            <tr>
                                                <th style="text-align: center;width:150px">Nama</th>
                                                <th style="text-align: center;width:100px">Email</th>
                                                <th style="text-align: center">Jenis</th>
                                                <th style="text-align: center">Posisi</th>
                                                <th style="text-align: center">Hari</th>
                                                <th style="text-align: center;width:50px">H</th>
                                                <th style="text-align: center;width:50px">B</th>
                                                <th style="text-align: center;width:50px">T</th>
                                                <th style="text-align: center;width:50px">J</th>
                                                <th style="text-align: center;width:50px">PIC</th>
                                                <th style="text-align: center;width:50px">Create</th>
                                                <th style="text-align: center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{ Crypt::decryptString($item->nama) }}</td>
                                                <td>{{ Crypt::decryptString($item->email) }}</td>
                                                <td>{{ $item->jenis }}</td>
                                                <td>{{ $item->posisi }}</td>
                                                <td>{{ $item->namahari }}</td>
                                                <td>{{ $item->hari }}</td>
                                                <td>{{ $item->bulan }}</td>
                                                <td>{{ $item->tahun }}</td>
                                                <td>{{ $item->jam }}</td>
                                                <td>{{ $item->pic }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td style="text-align:center">
                                                    <a href="{{ route('invitations.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
                                                        <span class="fas fa-trash"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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