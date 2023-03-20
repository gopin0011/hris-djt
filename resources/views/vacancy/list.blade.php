@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Lowongan Kerja</strong></h3>
                            <div class="card-tools">
                                <a type="button" class="btn btn-tool" href="{{ route('vacancies.index') }}" data-toggle="tooltip" title="Tampil Table">
                                    <i class="fas fa-table"></i></a>  
                                <a type="button" class="btn btn-tool" href="{{ route('vacancies.list') }}" data-toggle="tooltip" title="Tampil List">
                                    <i class="fas fa-list"></i></a>  
                            </div> 
                        </div>
                        
                        <div class="card-body"> 
                            <div class="card">
                                <table id="example8" class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                    <thead>
                                    <tr>
                                        <th>Loker</th>
                                        <th>Bisnis</th>
                                        <th>Dept.</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->unit }}</td>
                                            <td>{{ $item->divisi }}</td>
                                            <td>@if($item->status == '1') Aktif @else Tidak Aktif @endif</td>
                                            <td style="text-align:center">
                                                <a href="{{ route('vacancies.edit', ['id' => $item->id]) }}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Ubah">
                                                    <span class="fas fa-edit"></span>
                                                </a>
                                                <a href="{{ route('vacancies.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
                                                    <span class="fas fa-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-body"> 
                            <div class="card">
                                <div class="mb-3">
                                    <a href="{{ route('vacancies.create') }}" type="submit" class="btn btn-primary btn-block">Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection