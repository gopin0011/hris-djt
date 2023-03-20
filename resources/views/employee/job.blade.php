@extends('style.regemp')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Data Pekerjaan</strong></h3>
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
                                    <th>Status Karyawan</th>
                                    <th>Tanggal Join</th>
                                    <th>Massa Kerja</th>
                                    <th>Habis Kontrak</th>
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
                                        <td>@if( $item->status != ''){{ $item->status }}@endif</td>
                                        <td>@if( $item->hjoin != ''){{ Crypt::decryptString($item->hjoin) }} {{ Crypt::decryptString($item->bjoin) }} {{ Crypt::decryptString($item->thjoin)}}@endif</td>
                                        <td>@if( $item->thjoin != ''){{ number_format(date(now()->year) - Crypt::decryptString($item->thjoin)) }}@endif</td>
                                        <td>@if( $item->hjoin != ''){{ Crypt::decryptString($item->hakhir) }} {{ Crypt::decryptString($item->bakhir) }} {{ Crypt::decryptString($item->thakhir)}}@endif</td>
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