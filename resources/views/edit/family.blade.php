@extends('style.reguser')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Latar Belakang Keluarga</strong></h3>
                        </div>
                        <div class="card-body"> 
                            <div class="card">

                                <form method="POST" action="{{ route('families.updatedad', ['id' => $id]) }}">
                                    @csrf 
                                    <table class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>TTL</th>
                                                <th>Pendidikan</th>
                                                <th>Pekerjaan</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td hidden><input name="usid" value="{{ $id }}"></td>
                                                    <td><input name="nama" placeholder="Nama Ayah" type="text" class="form-control" required oninvalid="this.setCustomValidity('Nama ayah harus diisi')" oninput="setCustomValidity('')" @isset($ayah) value="{{ Crypt::decryptString($ayah[0]->nama) }}" @endisset></td>
                                                    <td><input name="ttl" placeholder="contoh : Bogor, 1 Januari 1970" type="text" class="form-control" @isset($ayah) value="{{ Crypt::decryptString($ayah[0]->ttl) }}" @endisset></td>
                                                    <td>
                                                        <select class="form-control" id="pendidikan" name="pendidikan">
                                                            <option value="" @isset($ayah){{ Crypt::decryptString($ayah[0]->pendidikan) == "" ? 'selected="selected"' : '' }} @endisset>Pendidikan Ayah</option>
                                                            <option value="SD" @isset($ayah){{ Crypt::decryptString($ayah[0]->pendidikan) == "SD" ? 'selected="selected"' : '' }} @endisset>SD</option>
                                                            <option value="SMP" @isset($ayah){{ Crypt::decryptString($ayah[0]->pendidikan) == "SMP" ? 'selected="selected"' : '' }} @endisset>SMP</option>
                                                            <option value="SMA/SMK" @isset($ayah){{ Crypt::decryptString($ayah[0]->pendidikan) == "SMA/SMK" ? 'selected="selected"' : '' }} @endisset>SMA/SMK</option>
                                                            <option value="D1" @isset($ayah){{ Crypt::decryptString($ayah[0]->pendidikan) == "D1" ? 'selected="selected"' : '' }} @endisset>D1</option>
                                                            <option value="D2" @isset($ayah){{ Crypt::decryptString($ayah[0]->pendidikan) == "D2" ? 'selected="selected"' : '' }} @endisset>D2</option>
                                                            <option value="D3" @isset($ayah){{ Crypt::decryptString($ayah[0]->pendidikan) == "D3" ? 'selected="selected"' : '' }} @endisset>D3</option>
                                                            <option value="D4" @isset($ayah){{ Crypt::decryptString($ayah[0]->pendidikan) == "D4" ? 'selected="selected"' : '' }} @endisset>D4</option>
                                                            <option value="S1" @isset($ayah){{ Crypt::decryptString($ayah[0]->pendidikan) == "S1" ? 'selected="selected"' : '' }} @endisset>S1</option>
                                                            <option value="S2" @isset($ayah){{ Crypt::decryptString($ayah[0]->pendidikan) == "S2" ? 'selected="selected"' : '' }} @endisset>S2</option>
                                                            <option value="S3" @isset($ayah){{ Crypt::decryptString($ayah[0]->pendidikan) == "S3" ? 'selected="selected"' : '' }} @endisset>S3</option>
                                                        </select>
                                                    </td>
                                                    <td><input name="pekerjaan" placeholder="Pekerjaan Ayah" type="text" class="form-control" @isset($ayah) value="{{ Crypt::decryptString($ayah[0]->pekerjaan) }}" @endisset></td>
                                                    <td style="text-align: center">
                                                        <button class="btn btn-primary btn-sm" style="color:white" data-toggle="tooltip" title="Simpan">
                                                            <span class="fas fa-save"></span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </form>

                                @if($ayah != NULL)
                                <form method="POST" action="{{ route('families.updatemom', ['id' => $id]) }}">
                                    @csrf 
                                    <table class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                        <tr>
                                            <td hidden><input name="usid" value="{{ $id }}"></td>
                                            <td><input name="nama" placeholder="Nama Ibu" type="text" class="form-control" required oninvalid="this.setCustomValidity('Nama ibu harus diisi')" oninput="setCustomValidity('')" @isset($ibu)value="{{ Crypt::decryptString($ibu[0]->nama) }}" @endisset></td>
                                            <td><input name="ttl" placeholder="contoh : Bogor, 1 Januari 1970" type="text" class="form-control" @isset($ibu)value="{{ Crypt::decryptString($ibu[0]->ttl) }}" @endisset></td>
                                            <td>
                                                <select class="form-control" id="pendidikan" name="pendidikan">
                                                    <option value="" @isset($ibu) {{ Crypt::decryptString($ibu[0]->pendidikan) == "" ? 'selected="selected"' : '' }} @endisset>Pendidikan Ibu</option>
                                                    <option value="SD" @isset($ibu) {{ Crypt::decryptString($ibu[0]->pendidikan) == "SD" ? 'selected="selected"' : '' }} @endisset>SD</option>
                                                    <option value="SMP" @isset($ibu) {{ Crypt::decryptString($ibu[0]->pendidikan) == "SMP" ? 'selected="selected"' : '' }} @endisset>SMP</option>
                                                    <option value="SMA/SMK" @isset($ibu) {{ Crypt::decryptString($ibu[0]->pendidikan) == "SMA/SMK" ? 'selected="selected"' : '' }} @endisset>SMA/SMK</option>
                                                    <option value="D1" @isset($ibu) {{ Crypt::decryptString($ibu[0]->pendidikan) == "D1" ? 'selected="selected"' : '' }} @endisset>D1</option>
                                                    <option value="D2" @isset($ibu) {{ Crypt::decryptString($ibu[0]->pendidikan) == "D2" ? 'selected="selected"' : '' }} @endisset>D2</option>
                                                    <option value="D3" @isset($ibu) {{ Crypt::decryptString($ibu[0]->pendidikan) == "D3" ? 'selected="selected"' : '' }} @endisset>D3</option>
                                                    <option value="D4" @isset($ibu) {{ Crypt::decryptString($ibu[0]->pendidikan) == "D4" ? 'selected="selected"' : '' }} @endisset>D4</option>
                                                    <option value="S1" @isset($ibu) {{ Crypt::decryptString($ibu[0]->pendidikan) == "S1" ? 'selected="selected"' : '' }} @endisset>S1</option>
                                                    <option value="S2" @isset($ibu) {{ Crypt::decryptString($ibu[0]->pendidikan) == "S2" ? 'selected="selected"' : '' }} @endisset>S2</option>
                                                    <option value="S3" @isset($ibu) {{ Crypt::decryptString($ibu[0]->pendidikan) == "S3" ? 'selected="selected"' : '' }} @endisset>S3</option>
                                                </select>
                                            </td>
                                            <td><input name="pekerjaan" placeholder="Pekerjaan Ibu" type="text" class="form-control" @isset($ibu) value="{{ Crypt::decryptString($ibu[0]->pekerjaan) }}" @endisset></td>
                                            <td style="text-align: center">
                                                <button class="btn btn-primary btn-sm" style="color:white" data-toggle="tooltip" title="Simpan">
                                                    <span class="fas fa-save"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                @endif

                                @foreach ($mate as $item)
                                    @if($ibu != NULL && Crypt::decryptString($item->status) == 'Menikah')            
                                        <form method="POST" action="{{ route('families.updatemate', ['id' => $id]) }}">
                                            @csrf 
                                            <table class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                                <tr>
                                                    @if(Crypt::decryptString($item->status) == 'Menikah' && Crypt::decryptString($item->gender) == 'Pria')
                                                        <td hidden><input name="usid" value="{{ $id }}"></td>
                                                        <td><input name="nama" placeholder="Nama Istri" type="text" class="form-control" required oninvalid="this.setCustomValidity('Nama istri harus diisi')" oninput="setCustomValidity('')" @isset($istri)value="{{ Crypt::decryptString($istri[0]->nama) }}" @endisset></td>
                                                        <td><input name="ttl" placeholder="contoh : Bogor, 1 Januari 1970" type="text" class="form-control" @isset($istri)value="{{ Crypt::decryptString($istri[0]->ttl) }}" @endisset></td>
                                                        <td>
                                                            <select class="form-control" id="pendidikan" name="pendidikan">
                                                                <option value="" @isset($istri) {{ Crypt::decryptString($istri[0]->pendidikan) == "" ? 'selected="selected"' : '' }} @endisset>Pendidikan Istri</option>
                                                                <option value="SD" @isset($istri) {{ Crypt::decryptString($istri[0]->pendidikan) == "SD" ? 'selected="selected"' : '' }} @endisset>SD</option>
                                                                <option value="SMP" @isset($istri) {{ Crypt::decryptString($istri[0]->pendidikan) == "SMP" ? 'selected="selected"' : '' }} @endisset>SMP</option>
                                                                <option value="SMA/SMK" @isset($istri) {{ Crypt::decryptString($istri[0]->pendidikan) == "SMA/SMK" ? 'selected="selected"' : '' }} @endisset>SMA/SMK</option>
                                                                <option value="D1" @isset($istri) {{ Crypt::decryptString($istri[0]->pendidikan) == "D1" ? 'selected="selected"' : '' }} @endisset>D1</option>
                                                                <option value="D2" @isset($istri) {{ Crypt::decryptString($istri[0]->pendidikan) == "D2" ? 'selected="selected"' : '' }} @endisset>D2</option>
                                                                <option value="D3" @isset($istri) {{ Crypt::decryptString($istri[0]->pendidikan) == "D3" ? 'selected="selected"' : '' }} @endisset>D3</option>
                                                                <option value="D4" @isset($istri) {{ Crypt::decryptString($istri[0]->pendidikan) == "D4" ? 'selected="selected"' : '' }} @endisset>D4</option>
                                                                <option value="S1" @isset($istri) {{ Crypt::decryptString($istri[0]->pendidikan) == "S1" ? 'selected="selected"' : '' }} @endisset>S1</option>
                                                                <option value="S2" @isset($istri) {{ Crypt::decryptString($istri[0]->pendidikan) == "S2" ? 'selected="selected"' : '' }} @endisset>S2</option>
                                                                <option value="S3" @isset($istri) {{ Crypt::decryptString($istri[0]->pendidikan) == "S3" ? 'selected="selected"' : '' }} @endisset>S3</option>
                                                            </select>
                                                        </td>
                                                        <td><input name="pekerjaan" placeholder="Pekerjaan Istri" type="text" class="form-control" @isset($istri) value="{{ Crypt::decryptString($istri[0]->pekerjaan) }}" @endisset></td>
                                                    @elseif(Crypt::decryptString($item->status) == 'Menikah' && Crypt::decryptString($item->gender) == 'Wanita')
                                                        <td hidden><input name="usid" value="{{ $id }}"></td>
                                                        <td><input name="nama" placeholder="Nama Suami" type="text" class="form-control" required oninvalid="this.setCustomValidity('Nama istri harus diisi')" oninput="setCustomValidity('')" @isset($suami)value="{{ Crypt::decryptString($suami[0]->nama) }}" @endisset></td>
                                                        <td><input name="ttl" placeholder="contoh : Bogor, 1 Januari 1970" type="text" class="form-control" @isset($suami)value="{{ Crypt::decryptString($suami[0]->ttl) }}" @endisset></td>
                                                        <td>
                                                            <select class="form-control" id="pendidikan" name="pendidikan">
                                                                <option value="" @isset($suami) {{ Crypt::decryptString($suami[0]->pendidikan) == "" ? 'selected="selected"' : '' }} @endisset>Pendidikan Suami</option>
                                                                <option value="SD" @isset($suami) {{ Crypt::decryptString($suami[0]->pendidikan) == "SD" ? 'selected="selected"' : '' }} @endisset>SD</option>
                                                                <option value="SMP" @isset($suami) {{ Crypt::decryptString($suami[0]->pendidikan) == "SMP" ? 'selected="selected"' : '' }} @endisset>SMP</option>
                                                                <option value="SMA/SMK" @isset($suami) {{ Crypt::decryptString($suami[0]->pendidikan) == "SMA/SMK" ? 'selected="selected"' : '' }} @endisset>SMA/SMK</option>
                                                                <option value="D1" @isset($suami) {{ Crypt::decryptString($suami[0]->pendidikan) == "D1" ? 'selected="selected"' : '' }} @endisset>D1</option>
                                                                <option value="D2" @isset($suami) {{ Crypt::decryptString($suami[0]->pendidikan) == "D2" ? 'selected="selected"' : '' }} @endisset>D2</option>
                                                                <option value="D3" @isset($suami) {{ Crypt::decryptString($suami[0]->pendidikan) == "D3" ? 'selected="selected"' : '' }} @endisset>D3</option>
                                                                <option value="D4" @isset($suami) {{ Crypt::decryptString($suami[0]->pendidikan) == "D4" ? 'selected="selected"' : '' }} @endisset>D4</option>
                                                                <option value="S1" @isset($suami) {{ Crypt::decryptString($suami[0]->pendidikan) == "S1" ? 'selected="selected"' : '' }} @endisset>S1</option>
                                                                <option value="S2" @isset($suami) {{ Crypt::decryptString($suami[0]->pendidikan) == "S2" ? 'selected="selected"' : '' }} @endisset>S2</option>
                                                                <option value="S3" @isset($suami) {{ Crypt::decryptString($suami[0]->pendidikan) == "S3" ? 'selected="selected"' : '' }} @endisset>S3</option>
                                                            </select>
                                                        </td>
                                                        <td><input name="pekerjaan" placeholder="Pekerjaan Suami" type="text" class="form-control" @isset($suami) value="{{ Crypt::decryptString($suami[0]->pekerjaan) }}" @endisset></td>
                                                    @endif
                                                    <td style="text-align: center">
                                                        <button class="btn btn-primary btn-sm" style="color:white" data-toggle="tooltip" title="Simpan">
                                                            <span class="fas fa-save"></span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        @if($ibu != NULL)
                        <div class="card-body"> 
                            <div class="card">
                                
                                <form method="POST" action="{{ route('families.update', ['id' => $id]) }}">
                                    @csrf 
                                    <table class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                        <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Hubungan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>TTL</th>
                                            <th>Pendidikan</th>
                                            <th>Pekerjaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{ Crypt::decryptString($item->nama) }}</td>
                                                <td>{{ Crypt::decryptString($item->status) }}</td>
                                                <td>{{ Crypt::decryptString($item->gender) }}</td>
                                                <td>{{ Crypt::decryptString($item->ttl) }}</td>
                                                <td>{{ Crypt::decryptString($item->pendidikan) }}</td>
                                                <td>{{ Crypt::decryptString($item->pekerjaan) }}</td>
                                                <td style="text-align:center">
                                                    <a href="{{ route('families.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
                                                        <span class="fas fa-trash"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td hidden><input name="usid" value="{{ $id }}"></td>
                                                <td><input name="nama" placeholder="Nama keluarga" type="text" class="form-control" required oninvalid="this.setCustomValidity('Nama keluarga harus diisi')" oninput="setCustomValidity('')"></td>
                                                <td>
                                                    <select name="status" class="form-control">
                                                        <option value="Kakak">Kakak</option>
                                                        <option value="Adik">Adik</option>
                                                        <option value="Anak">Anak</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="gender" class="form-control">
                                                        <option value="Pria">Pria</option>
                                                        <option value="Wanita">Wanita</option>
                                                    </select>
                                                </td>
                                                <td><input name="ttl" placeholder="contoh : Bogor, 1 Januari 1970" type="text" class="form-control"></td>
                                                <td>
                                                    <select name="pendidikan" class="form-control">
                                                        <option value="">-</option>
                                                        <option value="SD">SD</option>
                                                        <option value="SMP">SMP</option>
                                                        <option value="SMA/SMK">SMA/SMK</option>
                                                        <option value="D1">D1</option>
                                                        <option value="D2">D2</option>
                                                        <option value="D3">D3</option>
                                                        <option value="D4">D4</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                    </select>
                                                </td>
                                                <td><input name="pekerjaan" placeholder="Pekerjaan" type="text" class="form-control"></td>
                                                <td style="text-align: center">
                                                    <button class="btn btn-primary btn-sm" style="color:white" data-toggle="tooltip" title="Simpan">
                                                        <span class="fas fa-save"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection