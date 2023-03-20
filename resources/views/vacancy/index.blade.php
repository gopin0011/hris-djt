@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('vacancies.update', ['id' => Auth::user()->id]) }}">
                        @csrf              
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
                                @forelse ($data as $item)
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ $item->nama }} - {{ $item->unit }}/{{ $item->divisi }}</h4>
                                        <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                        <a type="button" class="btn btn-tool" href="{{ route('vacancies.edit', ['id' => $item->id]) }}" data-toggle="tooltip" title="Edit">
                                            <i class="fas fa-edit"></i></a>  
                                        <a type="button" class="btn btn-tool" href="{{ route('vacancies.delete', ['id' => $item->id]) }}" data-toggle="tooltip" title="Delete">
                                            <i class="fas fa-times"></i></a>    
                                        </div>
                                    </div>
                                    <div class="card-body"> 
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-th-large" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $item->unit }}" readonly="readonly">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-th" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $item->divisi }}" readonly="readonly">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-tasks" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <textarea class="form-control" readonly="readonly">{{ $item->deskripsi }}</textarea>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-check-square" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            @if($item->status == 1)
                                            <input type="text" class="form-control" value="Aktif" readonly="readonly">
                                            @else
                                            <input type="text" class="form-control" value="Non-aktif" readonly="readonly">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="card">
                                    <p style="text-align: center">Tidak ada data</p>
                                </div>
                                @endforelse
                            </div>
                            <div class="card-body"> 
                                <div class="card">
                                    <div class="mb-3">
                                        <a href="{{ route('vacancies.create') }}" type="submit" class="btn btn-primary btn-block">Tambah</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection