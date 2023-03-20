@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('references.update', ['id' => $id]) }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Referensi</strong></h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                           
                            <div class="card-body"> 
                                <div class="card">
                                    <table class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Perusahaan</th>
                                        <th>Jabatan</th>
                                        <th>Kontak</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ Crypt::decryptString($item->nama) }}</td>
                                            <td>{{ Crypt::decryptString($item->perusahaan) }}</td>
                                            <td>{{ Crypt::decryptString($item->jabatan) }}</td>
                                            <td>{{ Crypt::decryptString($item->kontak) }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('references.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
                                                    <span class="fas fa-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td hidden><input name="usid" value="{{ $id }}"></td>
                                            <td><input placeholder="Nama referensi" name="nama" type="text" class="form-control" required oninvalid="this.setCustomValidity('Nama referensi sosial harus diisi')" oninput="setCustomValidity('')"></td>
                                            <td><input placeholder="Perusahaan" name="perusahaan" type="text" class="form-control" ></td>
                                            <td><input placeholder="Jabatan" name="jabatan" type="text" class="form-control" ></td>
                                            <td><input placeholder="Kontak" name="kontak" type="text" class="form-control"></td>
                                            <td style="text-align: center">
                                                <button class="btn btn-primary btn-sm" style="color:white" data-toggle="tooltip" title="Simpan">
                                                    <span class="fas fa-save"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    </table>
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