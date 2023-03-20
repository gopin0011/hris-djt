@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('trainings.update', ['id' => Auth::user()->id]) }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Pendidikan Non-Formal (Kursus / Pelatihan / Seminar)</strong></h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                           
                            <div class="card-body"> 
                                <div class="card">
                                    <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Pendidikan Non-Formal</th>
                                        <th>Tahun</th>
                                        <th>Durasi (bulan)</th>
                                        <th>Ijazah</th>
                                        <th>Sumber Biaya</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ Crypt::decryptString($item->kursus) }}</td>
                                            <td>{{ Crypt::decryptString($item->tahun) }}</td>
                                            <td>{{ Crypt::decryptString($item->durasi) }}</td>
                                            <td>{{ Crypt::decryptString($item->ijazah) }}</td>
                                            <td>{{ Crypt::decryptString($item->biaya) }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('trainings.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
                                                    <span class="fas fa-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><input placeholder="Nama kursus" name="kursus" type="text" class="form-control" required oninvalid="this.setCustomValidity('Nama pendidikan non-formal harus diisi')" oninput="setCustomValidity('')"></td>
                                            <td>
                                                <select class="form-control" id="tahun" name="tahun">
                                                    {{ $tahun = date(now()->format('Y')) }}
                                                    @for($i=$tahun;$i>1900;$i--)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </td>
                                            <td><input placeholder="Durasi" name="durasi" type="text" class="form-control"></td>
                                            <td><input placeholder="No. ijazah" name="ijazah" type="text" class="form-control"></td>
                                            <td><input placeholder="Sumber biaya" name="biaya" type="text" class="form-control"></td>
                                            <td style="text-align: center">
                                                <button class="btn btn-primary btn-sm" style="color:white" data-toggle="tooltip" title="Simpan">
                                                    <span class="fas fa-save"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    </table>
                                    <div class="card-body"> 
                                        <a href="{{ route('studies.index') }}" class="btn btn-secondary btn-sm" style="float:left;width:100px">
                                            Kembali
                                        </a>
                                        <a href="{{ route('references.index') }}" class="btn btn-primary btn-sm" style="float:right;width:100px">
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