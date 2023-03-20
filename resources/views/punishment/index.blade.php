@extends('style.regemp')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Data Pelanggaran</strong></h3>
                        </div>
                        
                        <div class="card-body"> 
                            <div class="card">
                                <table id="example8" class="table table-bordered table-striped table-responsive w-100 d-block">
                                <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Unit Bisnis</th>
                                    <th>Divisi</th>
                                    <th>Jabatan</th>
                                    <th>Tanggal SP</th>
                                    <th>Jenis SP</th>
                                    <th>Alasan SP</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->nomor }}</td>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->bisnis }}</td>
                                        <td>{{ $item->divisi }}</td>
                                        <td>{{ $item->jabatan }}</td>
                                        <td>{{ $item->hari }} {{ $item->bulan }} 20{{ $item->tahun }}</td>
                                        <td>{{ $item->jenis }}</td>
                                        <td>{{ $item->alasan }}</td>
                                        <td style="text-align: left;width:100px">
                                            <a target="_blank" href="{{ route('punishments.print', ['id' => $item->id]) }}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Cetak" style="width:30px">
                                                <span class="fas fa-print"></span>
                                            </a>   
                                            <a href="{{ route('punishments.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus" style="width:30px">
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