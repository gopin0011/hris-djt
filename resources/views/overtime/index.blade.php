@extends('style.regovertime')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Daftar SPL</strong></h3>
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
                                    <th>Nomor</th>
                                    <th>Hari, Tanggal</th>
                                    <th>Unit Kerja</th>
                                    <th>Divisi</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                   @foreach ($data as $item)
                                   <tr>
                                    <td>{{ $item->nomor }}</td>
                                    <td>{{ $item->hari }}, {{ $item->hspl }} {{ $item->bspl }} {{ $item->thspl }}</td>
                                    <td>{{ $item->bisnis }}</td>
                                    <td>{{ $item->divisi }}</td>
                                    <td style="text-align:center">
                                        @if($item->status != 'diterima')
                                        @if(Auth::user()->admin == 2 || Auth::user()->admin == 3 ||(Auth::user()->admin == 9 && $item->hr == ''))
                                        <a href="{{ route('overtimes.detailcreate', ['id' => $item->nomor]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Approve">
                                            <span class="fas fa-check"></span>
                                        </a>
                                        @endif
                                        @if($item->manajer == '' && Auth::user()->admin == 8)
                                        <a href="{{ route('overtimes.detailcreate', ['id' => $item->nomor]) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" title="Ubah">
                                            <span class="fas fa-edit"></span>
                                        </a>
                                        @endif
                                        <a target="_blank" href="{{ route('overtimes.print', ['id' => $item->nomor]) }}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Cetak">
                                            <span class="fas fa-print"></span>
                                        </a>
                                        @if(($item->manajer == '' && $item->hr == '' && Auth::user()->admin == 8)||($item->manajer == '' && $item->hr == '' && Auth::user()->admin == 2)||(Auth::user()->admin == 3)||(Auth::user()->admin == 9 && $statspl == 0)||(Auth::user()->admin == 10 && $statspl == 0))
                                        <a href="{{ route('overtimes.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
                                            <span class="fas fa-trash"></span>
                                        </a>
                                        @elseif($statspl == 0 && Auth::user()->admin != 8)
                                        <a href="{{ route('overtimes.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
                                            <span class="fas fa-trash"></span>
                                        </a>
                                        @else
                                        @endif
                                        @else
                                        <a target="_blank" href="{{ route('overtimes.print', ['id' => $item->nomor]) }}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Cetak">
                                            <span class="fas fa-print"></span>
                                        </a>
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