@extends('style.regemp')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Data Kenaikan Gaji</strong></h3>
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
                                    <th>Gaji</th>
                                    <th>KPI</th>
                                    <th>%</th>
                                    <th>Nominal</th>
                                    <th>Tanggal</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee as $item)
                                    <tr>
                                        <td>{{$item->a }}</td>
                                        <td>@if( $item->b != ''){{ Crypt::decryptString($item->b) }}@endif</td>
                                        <td>{{ $item->c }}</td>
                                        <td>{{ $item->d }}</td>
                                        <td>@if( $item->e != ''){{ Crypt::decryptString($item->e) }}@endif</td>
                                        <td>@if( $item->f != ''){{ Crypt::decryptString($item->f) }}@endif</td>
                                        <td>@if( $item->g != ''){{ Crypt::decryptString($item->g) }} {{ Crypt::decryptString($item->h) }} {{ Crypt::decryptString($item->i) }}@endif</td>
                                        
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