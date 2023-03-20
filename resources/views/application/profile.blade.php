@extends('style.reguser')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Data Pelamar</strong></h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        
                        <div class="card-body"> 
                            <div class="card">
                                <table id="example8" class="table table-bordered table-striped table-responsive w-100 d-block">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Panggilan</th>
                                    <th>NIK</th>
                                    <th>Kontak</th>
                                    <th>Email</th>
                                    <th>TTL</th>
                                    <th>Gender</th>
                                    <th>Warganegara</th>
                                    <th>Agama</th>
                                    <th>Status</th>
                                    <th>Gol. Darah</th>
                                    <th>Alamat</th>
                                    <th>Domisili</th>
                                    <th>Hobi</th>
                                    <th>Pendidikan</th>
                                    <th>Sekolah</th>
                                    <th>Perusahaan Terakhir</th>
                                    <th>Posisi Terakhir</th>
                                    <th>Referensi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->a }}</td>
                                            <td>@if($item->b != ''){{ Crypt::decryptString($item->b) }}@endif</td>
                                            <td>@if($item->c != ''){{ Crypt::decryptString($item->c) }}@endif</td>
                                            <td>@if($item->d != ''){{ Crypt::decryptString($item->d) }}@endif</td>
                                            <td>{{ $item->e }}</td>
                                            <td>@if($item->f != ''){{ Crypt::decryptString($item->f) }}, {{ Crypt::decryptString($item->g) }} {{ Crypt::decryptString($item->h) }} {{ Crypt::decryptString($item->i) }}@endif</td>
                                            <td>@if($item->j != ''){{ Crypt::decryptString($item->j) }}@endif</td>
                                            <td>@if($item->k != ''){{ Crypt::decryptString($item->k) }}@endif</td>
                                            <td>@if($item->l != ''){{ Crypt::decryptString($item->l) }}@endif</td>
                                            <td>@if($item->m != ''){{ Crypt::decryptString($item->m) }}@endif</td>
                                            <td>@if($item->n != ''){{ Crypt::decryptString($item->n) }}@endif</td>
                                            <td>@if($item->o != ''){{ Crypt::decryptString($item->o) }}@endif</td>
                                            <td>@if($item->p != ''){{ Crypt::decryptString($item->p) }}@endif</td>
                                            <td>@if($item->q != ''){{ Crypt::decryptString($item->q) }}@endif</td>
                                            <td>@if($item->r != ''){{ Crypt::decryptString($item->r) }}@endif</td>
                                            <td>@if($item->s != ''){{ Crypt::decryptString($item->s) }}@endif</td>
                                            <td>@if($item->t != ''){{ Crypt::decryptString($item->t) }}@endif</td>
                                            <td>@if($item->u != ''){{ Crypt::decryptString($item->u) }}@endif</td>
                                            <td>@if($item->v != ''){{ Crypt::decryptString($item->v) }}@endif</td>  
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