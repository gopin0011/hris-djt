@extends('style.regemp')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Data Karyawan</strong></h3>
                        </div>
                        
                        <div class="card-body"> 
                            <div class="card">
                                <table id="example8" class="table table-bordered table-striped table-responsive w-100 d-block">
                                <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Unit Bisnis</th>
                                    <th>Divisi</th>
                                    <th>Jabatan</th>
                                    <th>Gender</th>
                                    <th>Agama</th>
                                    <th>KK</th>
                                    <th>KTP</th>
                                    <th>Alamat</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Usia</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee as $item)
                                    <tr>
                                        <td>{{$item->nik }}</td>
                                        <td>@if( $item->nama != ''){{ Crypt::decryptString($item->nama) }}@endif</td>
                                        <td>{{ $item->bisnis }}</td>
                                        <td>{{ $item->divisi }}</td>
                                        <td>@if( $item->jabatan != ''){{ Crypt::decryptString($item->jabatan) }}@endif</td>
                                        <td>@if( $item->gender != ''){{ Crypt::decryptString($item->gender) }}@endif</td>
                                        <td>@if( $item->agama != ''){{ Crypt::decryptString($item->agama) }}@endif</td>
                                        <td>@if( $item->kk != ''){{ Crypt::decryptString($item->kk) }}@endif</td>
                                        <td>@if( $item->ktp != ''){{ Crypt::decryptString($item->ktp) }}@endif</td>
                                        <td>@if( $item->alamat != ''){{ Crypt::decryptString($item->alamat) }}@endif</td>
                                        <td>@if( $item->tmlahir != ''){{ Crypt::decryptString($item->tmlahir) }}@endif</td>
                                        <td>@if( $item->hlahir != ''){{ Crypt::decryptString($item->hlahir) }} {{ Crypt::decryptString($item->blahir) }} {{ Crypt::decryptString($item->thahir)}}@endif</td>
                                        <td>@if( $item->thahir != ''){{ number_format(date(now()->year) - Crypt::decryptString($item->thahir)) }}@endif</td>
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