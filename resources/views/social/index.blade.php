@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('socials.update', ['id' => Auth::user()->id]) }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Kegiatan Sosial</strong></h3>
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
                                        <th>Kegiatan Sosial</th>
                                        <th>Tahun</th>
                                        <th>Jabatan</th>
                                        <th>Catatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ Crypt::decryptString($item->kegiatan) }}</td>
                                            <td>{{ Crypt::decryptString($item->tahun) }}</td>
                                            <td>{{ Crypt::decryptString($item->jabatan) }}</td>
                                            <td>{{ Crypt::decryptString($item->catatan) }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('socials.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
                                                    <span class="fas fa-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><input placeholder="Kegiatan sosial" name="kegiatan" type="text" class="form-control" required oninvalid="this.setCustomValidity('Nama kegiatan sosial harus diisi')" oninput="setCustomValidity('')"></td>
                                            <td>
                                                <select class="form-control" id="tahun" name="tahun">
                                                    {{ $tahun = date(now()->format('Y')) }}
                                                    @for($i=$tahun;$i>1900;$i--)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </td>
                                            <td><input placeholder="Jabatan" name="jabatan" type="text" class="form-control" ></td>
                                            <td><input placeholder="Catatan" name="catatan" type="text" class="form-control"></td>
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