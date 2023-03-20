@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('questions.store') }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Gambaran Diri</strong></h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            @foreach ($detaildata as $item)    
                            <div class="card-body"> 
                                <label>Apa alasan Anda bersedia mengikuti proses rekrutmen di PT. Dwida Jaya Tama?</label>
                                <div class="input-group mb-3">
                                    <textarea class="form-control" name="alasan" id="alasan" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">{{ $item->alasan }}</textarea>
                                </div>

                                <label>Sebutkan bidang yang menjadi minat Anda dalam bekerja, jelaskan!</label>
                                <div class="input-group mb-3">
                                    <textarea class="form-control" name="bidang" id="bidang" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">{{ $item->bidang }}</textarea>
                                </div>

                                <label>Apa rencana Anda dalam 3 - 5 tahun ke depan?</label>
                                <div class="input-group mb-3">
                                    <textarea class="form-control" name="rencana" id="rencana" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">{{ $item->rencana }}</textarea>
                                </div>

                                <label>Prestasi apa saja yang pernah Anda raih?</label>
                                <div class="input-group mb-3">
                                    <textarea class="form-control" name="prestasi" id="prestasi" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">{{ $item->prestasi }}</textarea>
                                </div>

                                <label>Apakah saat ini, Anda melamar pekerjaan di perusahaan selain PT. Dwida Jaya Tama? Jika ya, sebutkan!</label>
                                <div class="input-group mb-3">
                                    <textarea class="form-control" name="lamaran" id="lamaran" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">{{ $item->lamaran }}</textarea>
                                </div>

                                <label>Berikan gambaran mengenai diri Anda, mencakup: kehidupan keluarga, hobi, tokoh yang menginspirasi, kondisi yang tidak sesuai dengan harapan di tempat kerja saat ini dan diharapkan di PT. Dwida Jaya Tama, dan kontribusi yang dapat diberikan kepada PT. Dwida Jaya Tama apabila bergabung.</label>
                                <div class="input-group mb-3">
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">{{ $item->deskripsi }}</textarea>
                                </div>
                                
                                
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                </div>

                                <a href="{{ route('references.index') }}" class="btn btn-secondary btn-sm" style="float:left;width:100px">
                                    Kembali
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection