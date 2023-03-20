@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('vacancies.store') }}">
                        @csrf              
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Lowongan Kerja</strong></h3>
                            </div>
                            
                                <div class="card-body"> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-list-alt" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nama lowongan" id="nama" name="nama">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-th-large" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <select class="form-control" id="unit" name="unit">
                                            @foreach ($unit as $item)
                                                <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group mb-2">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-th" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <select class="form-control" id="divisi" name="divisi">
                                            @foreach ($divisi as $item)
                                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-tasks" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <textarea class="form-control" placeholder="Deskripsi pekerjaan" id="deskripsi" name="deskripsi"></textarea>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-check-square" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1">Aktif</option>
                                            <option value="0">Non-aktif</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection