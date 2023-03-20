@extends('style.reguser')
@section('content')
<div class="content-wrapper w-100 d-md-table">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Daftar Interview</strong></h3>
                        </div>
                        <div class="card-header">
                            <a href="{{ route('interview.list') }}" class="btn btn-primary btn-sm" style="float: left;width: 120px;margin:5px">
                                Semua
                            </a> 
                            <a href="{{ route('interview.keep') }}" class="btn btn-primary btn-sm" style="float: left;width: 120px;margin:5px">
                                Keep
                            </a> 
                        </div>
                        
                        <div class="card-body"> 
                            <div class="card">
                                <table id="example8" class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Posisi</th>
                                    <th>Alternatif</th>
                                    <th>Referensi</th>
                                    <th>Tes</th>
                                    <th>HR</th>
                                    <th>User</th>
                                    <th>Manajemen</th>
                                    <th>DISC</th>
                                    <th>IST</th>
                                    <th>CFIT</th>
                                    <th>Army Alpha</th>
                                    <th>Papikostik</th>
                                    <th>Kreprlin</th>
                                    <th>Hasil</th>
                                    <th>Gabung</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        @if($filter == 'list' || ($filter == 'keep' && $item->hasil != '' && Crypt::decryptString($item->hasil) == 'Hold'))
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <a href="{{ route('job-edit', ['id' => $item->id]) }}" class="btn btn-tool" style="color:rgb(11, 149, 241)">
                                                        {{ Crypt::decryptString($item->posisi1) }}
                                                    </a>
                                                </td>
                                                <td>@if($item->posisi2 != ''){{ Crypt::decryptString($item->posisi2) }}@endif</td>
                                                <td>@if($item->referensi != ''){{ Crypt::decryptString($item->referensi) }}@endif</td>
                                                <td>{{ $item->hari }} {{ $item->bulan }} {{ $item->tahun }}</td>
                                                <td>@if($item->hr != ''){{ Crypt::decryptString($item->hr) }}@endif</td> 
                                                <td>@if($item->user != ''){{ Crypt::decryptString($item->user) }}@endif</td> 
                                                <td>@if($item->mana != ''){{ Crypt::decryptString($item->mana) }}@endif</td>
                                                <td>@if($item->disctest != ''){{ Crypt::decryptString($item->disctest) }}@endif</td> 
                                                <td>@if($item->ist != ''){{ Crypt::decryptString($item->ist) }}@endif</td> 
                                                <td>@if($item->cfit != ''){{ Crypt::decryptString($item->cfit) }}@endif</td>
                                                <td>@if($item->armyalpha != ''){{ Crypt::decryptString($item->armyalpha) }}@endif</td>
                                                <td>@if($item->papikostik != ''){{ Crypt::decryptString($item->papikostik) }}@endif</td>
                                                <td>@if($item->kreprlin != ''){{ Crypt::decryptString($item->kreprlin) }}@endif</td>
                                                <td>
                                                    @if($item->hasil != '')
                                                        @if(Crypt::decryptString($item->hasil) == 'Diterima')
                                                            Pass
                                                        @elseif(Crypt::decryptString($item->hasil) == 'Hold')
                                                            Keep
                                                        @elseif(Crypt::decryptString($item->hasil) == 'Tidak Diterima')
                                                            Failed
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>@if($item->haris != ''){{ Crypt::decryptString($item->haris) }} {{ Crypt::decryptString($item->bulans) }} {{ Crypt::decryptString($item->tahuns) }}@endif</td>
                                                <td style="text-align: center">
                                                    @if(Auth::user()->admin == 2 || Auth::user()->admin == 3)
                                                    <a href="{{ route('interview.test', ['id' => $item->id]) }}" style="width: 75px;margin:5px" class="btn btn-primary btn-sm">
                                                        Interview
                                                    </a>   
                                                    <a href="{{ route('psychotest.test', ['id' => $item->id]) }}" style="width: 75px;margin:5px" class="btn btn-success btn-sm">
                                                        Psikotes
                                                    </a>        
                                                    <a href="{{ route('applications.deletedev', ['id' => $item->id]) }}" style="width: 75px;margin:5px" class="btn btn-danger btn-sm">
                                                        Hapus
                                                    </a>     
                                                    @else
                                                    <a href="{{ route('interview.test', ['id' => $item->id]) }}" class="btn btn-primary btn-sm">
                                                        Interview
                                                    </a>                                  
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
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