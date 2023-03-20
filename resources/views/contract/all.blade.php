@extends('style.regemp')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Daftar Perpanjangan Kontrak</strong></h3>
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
                                    <th>Nomor</th>
                                    <th>Posisi</th>
                                    <th>Unit Kerja</th>
                                    <th>Awal Kontrak</th>
                                    <th>Akhir Kontrak</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{ Crypt::decryptString($item->nama) }}</td>
                                        <td>{{ Crypt::decryptString($item->nomor) }}</td>
                                        <td>{{ Crypt::decryptString($item->posisi) }}</td>
                                        <td>{{ $item->kantor }}</td>
                                        <td>{{ $item->awalkontrakhari }} {{ $item->awalkontrakbulan }} {{ $item->awalkontraktahun }}</td>
                                        <td>{{ $item->akhirkontrakhari }} {{ $item->akhirkontrakbulan }} {{ $item->akhirkontraktahun }}</td>
                                        <td style="text-align: left">
                                            <a target="_blank" href="{{ route('contracts.printext', ['id' => $item->id]) }}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Cetak" style="width:30px">
                                                <span class="fas fa-print"></span>
                                            </a>   
                                            <a href="{{ route('contracts.deleteext', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus" style="width:30px">
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
                </div>
            </div>
        </div>
    </section>
</div>
@endsection