@extends('style.reguser')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <form method="POST" action="{{ route('job-edit.store', ['id' => $app->id]) }}">
                @csrf  
                <div class="card">
                    <div class="card-body">

                        <div class="input-group mb-2">
                            <div class="col-12">
                                <label for="id">ID Pelamar</label><br>
                                <input type="text" class="form-control" value="{{ $app->id }}" name="id" id="id" disabled>
                            </div>
                        </div>

                        <div class="input-group mb-2">
                            <div class="col-12">
                                <label for="id">Nama Pelamar</label><br>
                                <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="name" disabled>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="col-12">
                                <label for="id">Posisi</label><br>
                                <input type="text" class="form-control" value="{{ Crypt::decryptString($app->posisi) }}" name="posisi" id="posisi">
                            </div>
                        </div>

                        <div class="input-group mb-2">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Atur Ulang</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
