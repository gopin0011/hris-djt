@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Daftar Psikotes</strong></h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        
                        <div class="card-body"> 
                            <div class="card">
                                <table id="example8" class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Loker</th>
                                    <th>Loker Alternatif</th>
                                    <th>Referensi</th>
                                    <th>DISC</th>
                                    <th>IST</th>
                                    <th>CFIT</th>
                                    <th>Army Alpha</th>
                                    <th>Papikostik</th>
                                    <th>Kreprlin</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ Crypt::decryptString($item->posisi1) }}</td>
                                        <td>@if($item->posisi2 != ''){{ Crypt::decryptString($item->posisi2) }}@endif</td>
                                        <td>@if($item->referensi != ''){{ Crypt::decryptString($item->referensi) }}@endif</td>
                                        <td>@if($item->disctest != ''){{ Crypt::decryptString($item->disctest) }}@endif</td> 
                                        <td>@if($item->ist != ''){{ Crypt::decryptString($item->ist) }}@endif</td> 
                                        <td>@if($item->cfit != ''){{ Crypt::decryptString($item->cfit) }}@endif</td>
                                        <td>@if($item->armyalpha != ''){{ Crypt::decryptString($item->armyalpha) }}@endif</td>
                                        <td>@if($item->papikostik != ''){{ Crypt::decryptString($item->papikostik) }}@endif</td>
                                        <td>@if($item->kreprlin != ''){{ Crypt::decryptString($item->kreprlin) }}@endif</td>
                                        <td>{{ $item->hari }} {{ $item->bulan }} {{ $item->tahun }}</td>
                                        <td style="text-align: left">
                                            <a href="{{ route('psychotest.test', ['id' => $item->id]) }}" class="btn btn-primary btn-sm">
                                                Nilai
                                            </a>                                     
                                        </td>
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