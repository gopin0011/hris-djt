@extends('style.regswitch')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('offices.store') }}">
                        @csrf      
 
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Nama Direktur</strong></h3>
                            </div>
                            
                            <div class="card-body"> 
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-user" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nama Direktur" id="direktur" name="direktur" value="{{ $data->direktur }}">
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