@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Penentuan Jadwal Interview</strong></h3>
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
                                    <th>Nama</th>
                                    <th>Kontak</th>
                                    <th>Loker</th>
                                    <th>Loker Alternatif</th>
                                    <th>Referensi</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ Crypt::decryptString($item->kontak) }}</td>
                                        <td>{{ Crypt::decryptString($item->posisi1) }}</td>
                                        <td>@if($item->posisi2 != ""){{ Crypt::decryptString($item->posisi2) }}@endif</td>
                                        <td>@if($item->referensi != ""){{ Crypt::decryptString($item->referensi) }}@endif</td>
                                        <td style="text-align: left">
                                            <a href="{{ route('interview.setschedule', ['id' => $item->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Atur Jadwal">
                                                <span class="fas fa-calendar"></span>
                                            </a>
                                            <a href="{{ route('prints.applicantdev', ['id' => $item->id]) }}" target="_blank" class="btn btn-success btn-sm" data-toggle="tooltip" title="Lihat Aplikasi">
                                                <span class="fas fa-sticky-note"></span>
                                            </a>
                                            <a href="{{ route('applications.deletedev', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
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