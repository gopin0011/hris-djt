@extends('style.reguser')

@section('content')
<div class="content-wrapper  w-100 d-block d-md-table">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Daftar Aplikasi Pelamar</strong></h3>
                        </div>
                        <div class="card-header">
                            <a href="{{ route('applications.all') }}" class="btn btn-primary btn-sm" style="float: left;width: 120px;margin:5px">
                                Semua
                            </a> 
                            <a href="{{ route('applications.inv') }}" class="btn btn-primary btn-sm" style="float: left;width: 120px;margin:5px">
                                Undangan
                            </a> 
                            <a href="{{ route('applications.app') }}" class="btn btn-primary btn-sm" style="float: left;width: 120px;margin:5px">
                                Pelamar
                            </a> 
                        </div>
                        
                        <div class="card-body"> 
                            <div class="card">
                                <table id="example8" class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                <thead>
                                <tr>
                                    <th>Tanggal Interview</th>
                                    <th>Nama</th>
                                    <th>Doc</th>
                                    <th>NIK</th>
                                    <th>Loker</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Usia</th>
                                    <th>Alamat</th>
                                    <th>Kontak</th>
                                    <th>Email</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Sekolah</th>
                                    <th>Posisi Terakhir</th>
                                    <th>Perusahaan Terakhir</th>
                                    <th>Referensi</th>
                                    <th>Nilai DISC</th>
                                    <th>Nilai IST</th>
                                    <th>Nilai CFIT</th>
                                    <th>Nilai Army Alpha</th>
                                    <th>Nilai Papikostik</th>
                                    <th>Nilai Kreplin</th>
                                    <th>Interview HR</th>
                                    <th>Interview User</th>
                                    <th>Interview Manajemen</th>
                                    <th>Hasil Akhir</th>
                                    <th>Tanggal Gabung</th>
                                    <th>Undangan</th>
				    <th>Tahun</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td style="text-align: center">
                                            @if($item->d != '')
                                                {{ $item->d }} {{ $item->e }} {{ $item->f }}
                                            @else
                                            <a href="{{ route('interview.setschedule', ['id' => $item->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Undang interview">
                                                <span class="fas fa-calendar"></span>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('prints.applicantdev', ['id' => $item->id]) }}" target="_blank" class="btn btn-tool" style="color:rgb(11, 149, 241)">
                                                <strong>{{ $item->a }}</strong>
                                            </a>
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{ env('APP_FOLDER') ? url(env('APP_FOLDER').'/'.$item->lokasi) : url($item->lokasi) }}" class="btn btn-success btn-sm"  data-toggle="tooltip" title="Lihat file pendukung">
                                                <span class="fas fa-book"></span>
                                            </a>
                                        </td>
                                        <td>@if($item->a4 != ''){{ Crypt::decryptString($item->a4) }}@endif</td>
                                  
                                        <td>
                                            @if($item->b != '')
                                            <a href="{{ route('job-edit', ['id' => $item->id]) }}" class="btn btn-tool" style="color:rgb(11, 149, 241)">
                                                {{ Crypt::decryptString($item->b) }}
                                            </a>
                                            @endif
                                        </td>
                                        <td>@if($item->g != ''){{ Crypt::decryptString($item->g) }} {{ Crypt::decryptString($item->h) }} {{ Crypt::decryptString($item->i) }}@endif</td>
                                        <td>@if($item->i != ''){{  date(now()->format('Y')) - Crypt::decryptString($item->i) }}@endif</td>
                                        <td>@if($item->j != ''){{ Crypt::decryptString($item->j) }}@endif</td>
                                        <td>@if($item->k != ''){{ Crypt::decryptString($item->k) }}@endif</td>
                                        <td>{{ $item->l }}</td>
                                        <td>@if($item->s != ''){{ Crypt::decryptString($item->s) }}@endif</td>
                                        <td>@if($item->t != ''){{ Crypt::decryptString($item->t) }}@endif</td>
                                        <td>@if($item->u != ''){{ Crypt::decryptString($item->u) }}@endif</td>
                                        <td>@if($item->v != ''){{ Crypt::decryptString($item->v) }}@endif</td>
                                        <td>@if($item->c != ''){{ Crypt::decryptString($item->c) }}@endif</td>
                                        <td>@if($item->m != ''){{ Crypt::decryptString($item->m) }}@endif</td>
                                        <td>@if($item->n != ''){{ Crypt::decryptString($item->n) }}@endif</td>
                                        <td>@if($item->o != ''){{ Crypt::decryptString($item->o) }}@endif</td>
                                        <td>@if($item->p != ''){{ Crypt::decryptString($item->p) }}@endif</td>
                                        <td>@if($item->q != ''){{ Crypt::decryptString($item->q) }}@endif</td>
                                        <td>@if($item->r != ''){{ Crypt::decryptString($item->r) }}@endif</td>
                                        <td>@if($item->w != ''){{ Crypt::decryptString($item->w) }}@endif</td>
                                        <td>@if($item->x != ''){{ Crypt::decryptString($item->x) }}@endif</td>
                                        <td>@if($item->y != ''){{ Crypt::decryptString($item->y) }}@endif</td>
                                        <td>
                                            @if($item->z != '')
                                            @if(Crypt::decryptString($item->z) == 'Diterima')
                                            Pass
                                            @elseif(Crypt::decryptString($item->z) == 'Hold')
                                            Keep
                                            @elseif(Crypt::decryptString($item->z) == 'Tidak Diterima')
                                            Failed
                                            @endif
                                            @endif
                                        </td>
                                        <td>@if($item->a1 != ''){{ Crypt::decryptString($item->a1) }} {{ Crypt::decryptString($item->a2) }} {{ Crypt::decryptString($item->a3) }}@endif</td>
                                        <td>@if($item->code != '') Diundang @endif</td>
					<td>{{ $item->tahun }}</td>
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
