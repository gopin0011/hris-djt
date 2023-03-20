@extends('style.regswitch')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('users.updateprivilege', ['id' => $data->id]) }}">
                        @csrf      
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>User Account Control</strong></h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                                <div class="card-body"> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-user" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $data->name }}" readonly="readonly">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-envelope" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $data->email }}" readonly="readonly">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-asterisk" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <select class="form-control" id="admin" name="admin">
                                            <option value="0" {{ $data->admin == "0" ? 'selected="selected"' : '' }}>Pelamar</option>
                                            <option value="1" {{ $data->admin == "1" ? 'selected="selected"' : '' }}>Interviewer</option>
                                            <option value="2" {{ $data->admin == "2" ? 'selected="selected"' : '' }}>HR Staff</option>
                                            <option value="3" {{ $data->admin == "3" ? 'selected="selected"' : '' }}>Superadmin</option>
                                            <option value="8" {{ $data->admin == "8" ? 'selected="selected"' : '' }}>Admin Departemen</option>
                                            <option value="9" {{ $data->admin == "9" ? 'selected="selected"' : '' }}>Kepala Departemen</option>
                                        </select>
                                    </div>
                                    @if ($data->bisnis == "")
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-th-large" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <select class="form-control" id="unit" name="unit">
                                            <option value="">-</option>
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
                                            <option value="">-</option>
                                            @foreach ($divisi as $item)
                                                <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif

                                    @if ($data->bisnis != "")
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                            <span class="fas fa-th-large" style="width: 15px"></span>
                                            </div>
                                        </div>
                                        <select class="form-control" id="unit" name="unit">
                                            <option value="">-</option>
                                            @foreach ($unit as $item)
                                            <option value="{{ $item->nama }}" {{ $data->bisnis == $item->nama ? 'selected="selected"' : '' }}>{{ $item->nama }}</option>
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
                                            <option value="">-</option>
                                            @foreach ($divisi as $item)
                                            <option value="{{ $item->nama }}" {{ $data->divisi == $item->nama ? 'selected="selected"' : '' }}>{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
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