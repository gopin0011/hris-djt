@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Daftar Dokumen</strong></h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>

                        <div id="myKTP" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="img-fluid mb-2" src="dokumenpelamar/{{ Auth::user()->nik }}/KTP.jpg">
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="myFoto" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="img-fluid mb-2" src="dokumenpelamar/{{ Auth::user()->nik }}/Foto.jpg">
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="myKK" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="img-fluid mb-2" src="dokumenpelamar/{{ Auth::user()->nik }}/KK.jpg">
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="myNPWP" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="img-fluid mb-2" src="dokumenpelamar/{{ Auth::user()->nik }}/NPWP.jpg">
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="myBPJS" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="img-fluid mb-2" src="dokumenpelamar/{{ Auth::user()->nik }}/BPJS.jpg">
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body"> 
                            <div class="card">        
                                <form action="{{ route('documents.process') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                    
                                    <table class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;vertical-align: middle">Objek</th>
                                                <th style="text-align: center;vertical-align: middle">File</th>
                                                <th style="text-align: center;vertical-align: middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: center;vertical-align: middle">
                                                    KTP
                                                </th>
                                                <th style="width:200px;text-align: center;vertical-align: middle">         
                                                    @if(file_exists('dokumenpelamar/' . Auth::user()->nik .'/KTP.jpg'))
                                                    <a href="dokumenpelamar/{{ Auth::user()->nik }}/KTP.jpg" data-toggle="modal" data-target="#myDoc" class="open-myDoc">
                                                        <img class="img-fluid mb-2" src="dokumenpelamar/{{ Auth::user()->nik }}/KTP.jpg" style="width:150px">
                                                    </a>
                                                    @elseif(file_exists('dokumenpelamar/' . Auth::user()->nik .'/KTP.png'))
                                                    <a href="dokumenpelamar/{{ Auth::user()->nik }}/KTP.png" data-toggle="modal" data-target="#myDoc" class="open-myDoc">
                                                        <img class="img-fluid mb-2" src="dokumenpelamar/{{ Auth::user()->nik }}/KTP.png" style="width:150px">
                                                    </a>
                                                    @else
                                                    <input class="form-group" type="file" name="ktp">
                                                    @endif
                                                </th>
                                                <th style="width:200px;text-align: center;vertical-align: middle">
                                                    @if(file_exists('dokumenpelamar/' . Auth::user()->nik .'/KTP.jpg'))
                                                    <a href="{{ route('documents.delete', ['id' => Auth::user()->nik]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus KTP" style="width:30px">
                                                        <span class="fas fa-trash"></span>
                                                    </a>
                                                    @elseif(file_exists('dokumenpelamar/' . Auth::user()->nik .'/KTP.png'))
                                                    <a href="{{ route('documents.delete', ['id' => Auth::user()->nik]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus KTP" style="width:30px">
                                                        <span class="fas fa-trash"></span>
                                                    </a>
                                                    @else
                                                    
                                                    @endif
                                                </th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary btn-block">Unggah Dokumen</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).on("click", ".open-myDoc", function () {
            var myBookId = $(this).data('id');
            $(".modal-body #bookId").val( myBookId );
        });
    </script>

</div>
@endsection