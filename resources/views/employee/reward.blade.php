@extends('style.regemp')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Data Penghargaan</strong></h3>
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
                                    <th>Tgl. Reward 5 Tahun</th>
                                    <th>Reward 5 Tahun</th>
                                    <th>Tgl. Reward 10 Tahun</th>
                                    <th>Reward 10 Tahun</th>
                                    <th>Tgl. Reward 15 Tahun</th>
                                    <th>Reward 15 Tahun</th>
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
                                        <td>@if( $item->hreward5 != ''){{ Crypt::decryptString($item->hreward5) }} {{ Crypt::decryptString($item->breward5) }} {{ Crypt::decryptString($item->threward5)}}@endif</td>
                                        <td>@if( $item->reward5 != ''){{ Crypt::decryptString($item->reward5) }}@endif</td>
                                        <td>@if( $item->hreward10 != ''){{ Crypt::decryptString($item->hreward10) }} {{ Crypt::decryptString($item->breward10) }} {{ Crypt::decryptString($item->threward10)}}@endif</td>
                                        <td>@if( $item->reward10 != ''){{ Crypt::decryptString($item->reward10) }}@endif</td>
                                        <td>@if( $item->hreward15 != ''){{ Crypt::decryptString($item->hreward15) }} {{ Crypt::decryptString($item->breward15) }} {{ Crypt::decryptString($item->threward15)}}@endif</td>
                                        <td>@if( $item->reward15 != ''){{ Crypt::decryptString($item->reward15) }}@endif</td>
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