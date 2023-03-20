@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('languages.update', ['id' => Auth::user()->id]) }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Kemampuan Bahasa</strong></h3>
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
                                        <th>Bahasa</th>
                                        <th>Menulis</th>
                                        <th>Membaca</th>
                                        <th>Bicara</th>
                                        <th>Catatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ Crypt::decryptString($item->bahasa) }}</td>
                                            <td>{{ Crypt::decryptString($item->menulis) }}</td>
                                            <td>{{ Crypt::decryptString($item->membaca) }}</td>
                                            <td>{{ Crypt::decryptString($item->bicara) }}</td>
                                            <td>{{ Crypt::decryptString($item->catatan) }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('languages.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
                                                    <span class="fas fa-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><input placeholder="Bahasa" name="bahasa" type="text" class="form-control" required oninvalid="this.setCustomValidity('Bahasa harus diisi')" oninput="setCustomValidity('')"></td>
                                            <td>
                                                <select class="form-control" id="menulis" name="menulis">
                                                    <option value="Dasar">Dasar</option>
                                                    <option value="Menengah">Menengah</option>
                                                    <option value="Mahir">Mahir</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" id="membaca" name="membaca">
                                                    <option value="Dasar">Dasar</option>
                                                    <option value="Menengah">Menengah</option>
                                                    <option value="Mahir">Mahir</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" id="bicara" name="bicara">
                                                    <option value="Dasar">Dasar</option>
                                                    <option value="Menangah">Menangah</option>
                                                    <option value="Mahir">Mahir</option>
                                                </select>
                                            </td>
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