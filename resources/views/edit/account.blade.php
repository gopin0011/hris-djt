@extends('style.regoption')
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Ubah Akun Pelamar</strong></h3>
                        </div>
                            <div class="card-body">  
                            <form method="POST" action="{{ route('editor.update', ['id' => $data->id]) }}">
                                @csrf 
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-user" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nama " id="name" name="name" value="{{ $data->name }}" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">
                                </div>
                   
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-envelope" style="width: 15px"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Email " id="email" name="email" value="{{ $data->email }}" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')">
                                </div>

                                <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection