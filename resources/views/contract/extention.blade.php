@extends('style.regemp')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('contracts.store') }}">
                        @csrf              

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