@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Daftar Hasil Interview dan Psikotes</strong></h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        
                        <div class="card-body"> 
                            <div class="card">
                                <table id="example4" class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Loker</th>
                                    <th>Loker Alternatif</th>
                                    <th>Referensi</th>
                                    <th>Hasil</th>
                                    <th>Tanggal Gabung</th>
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
                                        <td>@if($item->hasil != ''){{ Crypt::decryptString($item->hasil) }}@endif</td>
                                        <td>@if($item->hari != ''){{ Crypt::decryptString($item->hari) }} {{ Crypt::decryptString($item->bulan) }} {{ Crypt::decryptString($item->tahun) }}@endif</td>
                                        <td style="text-align: left">
                                            <a href="{{ route('results.test', ['id' => $item->id]) }}" class="btn btn-primary btn-sm" style="width:75px">
                                                Hasil
                                            </a>
                                            @if($item->hasil != '')
                                                @if(Crypt::decryptString($item->hasil) == "Diterima" && Auth::user()->admin == "3")       
                                                    <a href="{{ route('contracts.create', ['id' => $item->user_id, 'idcon' => $item->id]) }}" class="btn btn-success btn-sm" style="width:75px">
                                                        Kontrak
                                                    </a>     
                                                @endif     
                                            @endif  
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