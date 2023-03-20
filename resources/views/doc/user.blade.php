@extends('style.regoption')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <form method="POST" action="{{ route('docs.process') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}             
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Form HR</strong></h3>
                            </div>
                            
                            <div class="card-body"> 
                                <div class="card">
                                    <table class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                    <thead>
                                    <tr>
                                        <th>Nama File</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td style="text-align:center">
                                                <a target="_blank" href="{{ "/hris/" . $item->lokasi }}" class="btn btn-primary btn-sm">
                                                    Tampil Form
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
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