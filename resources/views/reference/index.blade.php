@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('references.update', ['id' => Auth::user()->id]) }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Referensi</strong></h3>
                            </div>
                            <div class="card-header">
                                <table>
                                    <tr>
                                        <td style="vertical-align: top"><p style="font-size: 11pt">1.</p></td>
                                        <td>
                                            <p style="font-size: 11pt">Referensi dapat diisi dengan menuliskan kontak rekan kerja/atasan di perusahaan sebelumnya yang dapat dihibungi</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top"><p style="font-size: 11pt">2.</p></td>
                                        <td>
                                            <p style="font-size: 11pt">Jika belum pernah memiliki penglaman kerja mohon tuliskan kontak keluarga/kerabat dekat yang dapat dihubungi, dengan nama perusahaan dikosongkan dan jabatan diisi dengan status hubungan kerabat/keluarga</p>
                                        </td>
                                    </tr>
                                </table>
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
                                    <div class="card-body"> 
                                        <a href="{{ route('trainings.index') }}" class="btn btn-secondary btn-sm" style="float:left;width:100px">
                                            Kembali
                                        </a>
                                        <a href="{{ route('questions.index') }}" class="btn btn-primary btn-sm" style="float:right;width:100px" @if($data->count()== 0) hidden @endif>
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