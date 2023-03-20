@extends('style.regemp')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Daftar Data Karyawan (Resign)</strong></h3>
                            <a href="{{ route('employees.resign') }}" class="btn btn-warning btn-sm" style="float: right;width: 120px;margin:5px">
                                All ({{ $acount }})
                            </a> 
                            <a href="{{ route('employees.resignalper') }}" class="btn btn-success btn-sm" style="float: right;width: 120px;margin:5px">
                                Alat Peraga ({{ $bcount }})
                            </a>  
                            <a href="{{ route('employees.resignlegano') }}" class="btn btn-primary btn-sm" style="float: right;width: 120px;margin:5px">
                                Legano ({{ $ccount }})
                            </a> 
                        </div>
                        
                        <div class="card-body"> 
                            <div class="card">
                                <table id="example8" class="table table-bordered table-striped table-responsive w-100 d-block">
                                <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Ubah</th>
                                    @if(Auth::user()->admin == "3")
                                    <th>Hapus</th>
                                    @endif
                                    <th>Resign</th>                                    
                                    <th>Unit Bisnis</th>
                                    <th>Divisi</th>
                                    <th>Jabatan</th>
                                    <th>Gender</th>
                                    <th>Agama</th>
                                    <th>KK</th>
                                    <th>KTP</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Sertifikat</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Usia</th>
                                    @if(Auth::user()->admin == "3")<th>Gaji</th>@endif
                                    <th>No. Rekening</th>
                                    <th>NPWP</th>
                                    <th>Status PTKP</th>
                                    <th>Status Karyawan</th>
                                    <th>Tanggal Join</th>
                                    <th>Massa Kerja</th>
                                    <th>Habis Kontrak</th>
                                    <th>Pendidikan</th>
                                    <th>Sekolah</th>
                                    <th>Program Studi</th>
                                    <th>No. Ijazah</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee as $item)
                                    <tr>
                                        <td>{{$item->nik }}</td>
                                        <td>@if( $item->nama != ''){{ Crypt::decryptString($item->nama) }}@endif</td>
                                        <td style="text-align: center">
                                            <a href="{{ route('employees.edit', ['id' => $item->id]) }}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Ubah" style="width:35px">
                                                <span class="fas fa-edit"></span>
                                            </a>                          
                                        </td>
                                        @if(Auth::user()->admin == "3")
                                        <td style="text-align: center">   
                                            <a href="{{ route('employees.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus" style="width:35px">
                                                <span class="fas fa-trash"></span>
                                            </a>                        
                                        </td>
                                        @endif
                                        <td>{{ $item->resign }}</td>
                                        <td>{{ $item->bisnis }}</td>
                                        <td>{{ $item->divisi }}</td>
                                        <td>@if( $item->jabatan != ''){{ Crypt::decryptString($item->jabatan) }}@endif</td>
                                        <td>@if( $item->gender != ''){{ Crypt::decryptString($item->gender) }}@endif</td>
                                        <td>@if( $item->agama != ''){{ Crypt::decryptString($item->agama) }}@endif</td>
                                        <td>@if( $item->kk != ''){{ Crypt::decryptString($item->kk) }}@endif</td>
                                        <td>@if( $item->ktp != ''){{ Crypt::decryptString($item->ktp) }}@endif</td>
                                        <td>@if( $item->alamat != ''){{ Crypt::decryptString($item->alamat) }}@endif</td>
                                        <td>@if( $item->email != ''){{ Crypt::decryptString($item->email) }}@endif</td>
                                        <td>{{ $item->sertifikat }}</td>
                                        <td>@if( $item->tmlahir != ''){{ Crypt::decryptString($item->tmlahir) }}@endif</td>
                                        <td>@if( $item->hlahir != ''){{ Crypt::decryptString($item->hlahir) }} {{ Crypt::decryptString($item->blahir) }} {{ Crypt::decryptString($item->thahir)}}@endif</td>
                                        <td>@if( Crypt::decryptString($item->thahir) != NULL){{ number_format(date(now()->year) - Crypt::decryptString($item->thahir)) }}@endif</td>
                                        @if(Auth::user()->admin == "3")<td>@if( $item->gaji != '' && Crypt::decryptString($item->gaji) != NULL){{ number_format(Crypt::decryptString($item->gaji)) }}@endif</td>@endif
                                        <td>@if( $item->rekening != ''){{ Crypt::decryptString($item->rekening) }}@endif</td>
                                        <td>@if( $item->npwp != ''){{ Crypt::decryptString($item->npwp) }}@endif</td>
                                        <td>@if( $item->ptkp != ''){{ Crypt::decryptString($item->ptkp) }}@endif</td>
                                        <td>@if( $item->status != ''){{ $item->status }}@endif</td>
                                        <td>@if( $item->hjoin != ''){{ $item->hjoin }} {{ $item->bjoin }} {{ $item->thjoin}}@endif</td>
                                        <td>@if( $item->thjoin != ''){{ number_format(date(now()->year) - $item->thjoin) }}@endif</td>
                                        <td>@if( $item->hakhir != ''){{ $item->hakhir }} {{ $item->bakhir }} {{ $item->thakhir }}@endif</td>
                                        <td>@if( $item->pendidikan != ''){{ Crypt::decryptString($item->pendidikan) }}@endif</td>
                                        <td>@if( $item->sekolah != ''){{ Crypt::decryptString($item->sekolah) }}@endif</td>
                                        <td>@if( $item->prodi != ''){{ Crypt::decryptString($item->prodi) }}@endif</td>
                                        <td>@if( $item->ijazah != ''){{ Crypt::decryptString($item->ijazah) }}@endif</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection