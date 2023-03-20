@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">          
                    @if(Auth::user()->admin == 1 ||Auth::user()->admin == 11)
                    <div class="card">           
                        <div class="card-body"> 
                            <div class="card">
                                <div class="mb-12">
                                    <div class="input-group mb-12">
                                        <form id="search" method="GET" action="{{ route('caripelamar') }}" >
                                            <table>
                                            <tr>
                                                <td><input name="q" placeholder="ID Daftar Interview" type="text" class="form-control" style="margin: 5px"></td>
                                                <td><button type="submit" id="submitButton"  class="btn btn-primary" style="margin: 5px">Cari Pelamar</button></td>
                                            </tr>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection