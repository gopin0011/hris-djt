@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Daftar Dokumen</strong></h3>
                        </div>

                        <div class="card-body"> 
                            <div class="card">
                                <table id="example4" class="table">
                                <thead>
                                <tr>
                                    <th>Nama Pemilik Dokumen</th>
                                    <th>Nama Dokumen</th>
                                    <th>Tipe Dokumen</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                    @forelse($data as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->file }}</td>
                                        <td>{{ $item->tipe }}</td>
                                        <td>
                                            <a target="_blank" href="{{ "/hris/" . $item->lokasi }}" class="btn btn-primary btn-sm" style="width:70px">
                                                Tampil
                                            </a>
                                            <a href="{{ route('documents.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" style="width:70px">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        
                                    @endforelse
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