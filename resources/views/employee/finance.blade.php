@extends('style.regemp')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Data Keuangan</strong></h3>
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
                                    @if(Auth::user()->admin == "3")<th>Gaji</th>@endif
                                    <th>No. Rekening</th>
                                    <th>NPWP</th>
                                    <th>Status PTKP</th>
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
                                        @if(Auth::user()->admin == "3")<td>@if( $item->gaji != ''){{ Crypt::decryptString($item->gaji) }}@endif</td>@endif
                                        <td>@if( $item->rekening != ''){{ Crypt::decryptString($item->rekening) }}@endif</td>
                                        <td>@if( $item->npwp != ''){{ Crypt::decryptString($item->npwp) }}@endif</td>
                                        <td>@if( $item->ptkp != ''){{ Crypt::decryptString($item->ptkp) }}@endif</td>
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