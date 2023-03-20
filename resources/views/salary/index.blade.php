@extends('style.regemp')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Daftar Kenaikan Gaji</strong></h3>
                        </div>
                        
                        <div class="card-body"> 
                            <div class="card">
                                <table id="example4">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>KPI</th>
                                        <th>Persentasi KPI</th>
                                        <th>Nominal</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->nik }}</td>
                                        <td>@if( $item->nama != ''){{ Crypt::decryptString($item->nama) }}@endif</td>
                                        <td>@if( $item->kpi != ''){{ Crypt::decryptString($item->kpi) }}@endif</td>
                                        <td>@if( $item->pkpi != ''){{ Crypt::decryptString($item->pkpi) }}@endif</td>
                                        <td>@if( $item->nominal != ''){{ number_format(Crypt::decryptString($item->nominal)) }}@endif</td>
                                        <td>@if( $item->hkpi != ''){{ Crypt::decryptString($item->hkpi) }} {{ Crypt::decryptString($item->bkpi) }} {{ Crypt::decryptString($item->thkpi)}}@endif</td>
                                        <td style="text-align: left">  
                                            <a href="{{ route('salaries.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus" style="width:30px">
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