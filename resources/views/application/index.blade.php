@extends('style.reguser')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('applications.update', ['id' => Auth::user()->id]) }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Aplikasi Lowongan Pekerjaan</strong></h3>
                            </div>
                            <div class="card-header">
                                <p>Bagi yang memiliki <strong>Invitation Code</strong>, yang didapat dari email, Anda dapat mempergunakannya di kolom "Invitation Code".</p>
                           
                            </div>

                            <div class="card-body"> 
                                <div class="card">
                                    <table class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                        <thead>
                                        <tr>
                                            <th>Loker</th>
                                            <th>Loker Alternatif</th>
                                            <th style="width: 120px">Invitation Code</th>
                                            <th style="width: 120px">Sumber Info</th>
                                            <th>Kerabat</th>
                                            <th>Jadwal</th>
                                            <th style="width: 100px">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{ Crypt::decryptString($item->posisi) }}</td>
                                                <td>@if($item->posisialt != ''){{ Crypt::decryptString($item->posisialt) }}@endif</td>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ Crypt::decryptString($item->info) }}</td>
                                                <td>{{ Crypt::decryptString($item->kerabat) }}</td>
                                                <td>{{ $item->jadwalhari }} {{ $item->jadwalbulan }} {{ $item->jadwaltahun }} {{ $item->jadwaljam }}</td>
                                                <td>
                                                        <a target="_blank" hidden href="{{ route('prints.applicant', ['id' => $item->id]) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Lihat Aplikasi Pelamar">
                                                            <span class="fas fa-print"></span>
                                                        </a>
                                                    @if($item->jadwalhari == null)
                                                        <a href="{{ route('applications.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
                                                            <span class="fas fa-trash"></span>
                                                        </a>
                                                    @endif       
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr @if($a != 0) hidden @endif>
                                                <td>                                                    
                                                    <select class="form-control" id="posisi" name="posisi">
                                                        @foreach ($vacancy as $vac)
                                                            <option value="{{ $vac->nama }}">{{ $vac->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>                                                    
                                                    <select class="form-control" id="posisilt" name="posisilt">
                                                            <option value="">-- Tidak Ada --</option>
                                                        @foreach ($vacancy as $vac)
                                                            <option value="{{ $vac->nama }}">{{ $vac->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input name="code" id="code" placeholder="Inv. Code" type="text" class="form-control"></td>
                                                <td><input name="info" id="info" placeholder="Info" type="text" class="form-control"></td>
                                                <td><input name="kerabat" id="kerabat" placeholder="Kerabat/saudara di PT. DJT" type="text" class="form-control"></td>
                                                <td></td>
                                                <td style="text-align: center">
                                                    @if($x == 0)
                                                        <button class="btn btn-primary btn-sm" style="color:white" data-toggle="tooltip" title="Simpan">
                                                            <span class="fas fa-save"></span>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="7">* hanya dapat membuat satu aplikasi</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="card-body"> 
                                        <a href="{{ route('profiles.index') }}" class="btn btn-primary btn-sm" style="float:right;width:100px" @if($a == 0) hidden @endif>
                                            Lanjutkan
                                        </a>
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
