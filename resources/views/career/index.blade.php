@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('careers.update', ['id' => Auth::user()->id]) }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Pengalaman Kerja</strong></h3>
                            </div>
                           
                            <div class="card-body"> 
                                @forelse ($data as $item)
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ Crypt::decryptString($item->perusahaan) }} - {{ Crypt::decryptString($item->jabatan) }}</h4>
                                        <div class="card-tools" hidden>
 
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>  
                                        </div>
                                    </div>
                                    <div class="card-body"> 
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-map-marker" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="{{ Crypt::decryptString($item->alamat) }}" readonly="readonly">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-calendar" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="{{ Crypt::decryptString($item->bulanmasuk)}} {{ Crypt::decryptString($item->tahunmasuk) }} - {{ Crypt::decryptString($item->bulankeluar) }} {{ Crypt::decryptString($item->tahunkeluar) }}" readonly="readonly">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-money-bill-alt" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="Rp. {{ Crypt::decryptString($item->gaji) }}" readonly="readonly">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-tasks" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <textarea class="form-control" readonly="readonly">{{ Crypt::decryptString($item->pekerjaan) }}</textarea>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-crown" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="{{ Crypt::decryptString($item->prestasi) }}" readonly="readonly">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                <span class="fas fa-sticky-note" style="width: 15px"></span>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="{{ Crypt::decryptString($item->alasan) }}" readonly="readonly">
                                        </div>
                                        <div style="display: flex; justify-content: flex-end">
                                            <a type="button" style="margin: 5pt;width:100px" class="btn btn-success" href="{{ route('careers.edit', ['id' => $item->id]) }}">
                                                Ubah
                                            </a>  
                                            <a type="button" style="margin: 5pt;width:100px" class="btn btn-danger" href="{{ route('careers.delete', ['id' => $item->id]) }}">
                                                Hapus
                                            </a> 
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
                                        <a href="{{ route('careers.create') }}" type="submit" class="btn btn-primary btn-block">Tambah</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body"> 
                                <a href="{{ route('families.index') }}" class="btn btn-secondary btn-sm" style="float:left;width:100px">
                                    Kembali
                                </a>
                                <a href="{{ route('studies.index') }}" class="btn btn-primary btn-sm" style="float:right;width:100px">
                                    Lanjutkan
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection