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
                            <h3 class="card-title"><strong>Ubah Data</strong></h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">   
                            <form method="POST" action="{{ route('edit.account') }}">
                                @csrf 

                                @foreach($user as $item)
                                <div class="input-group mb-3">
                                    <input type="text" value="{{ $item->name }}" class="form-control" placeholder="Nama Lengkap" name="name" id="name" required oninvalid="this.setCustomValidity('Nama lengkap harus diisi')" oninput="setCustomValidity('')">
                                    <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="email" value="{{ $item->email }}" class="form-control" placeholder="Email" name="email" id="email" required oninvalid="this.setCustomValidity('Email harus diisi')" oninput="setCustomValidity('')">
                                    <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                    </div>
                                </div>
                                @endforeach

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