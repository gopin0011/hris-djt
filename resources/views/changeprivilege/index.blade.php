@extends('style.regswitch')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>User Account Control</strong></h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        
                        <div class="card-body"> 
                            <div class="card">
                                <table id="example4" class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>User Level</th>
                                    <th>Bisnis</th>
                                    <th>Divisi</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if($item->admin == '0')
                                            Pelamar
                                            @elseif($item->admin == '1')
                                            Interviewer
                                            @elseif($item->admin == '2')
                                            HR Staff
                                            @elseif($item->admin == '3')
                                            Superadmin
                                            @elseif($item->admin == '8')
                                            Admin Departemen
                                            @elseif($item->admin == '9')
                                            Kepala Departemen
                                            @endif
                                        </td>
                                        <td>{{ $item->bisnis }}</td>
                                        <td>{{ $item->divisi }}</td>
                                        <td style="text-align: left">
                                            <a href="{{ route('users.changeprivilege', ['id' => $item->id]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip">
                                                <span class="fas fa-cog"></span>
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