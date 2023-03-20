@extends('style.reguser')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Upload Dokumen</strong></h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="card-body"> 
                            <div class="card">        
                                <form action="{{ route('documents.process') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <tbody>
                                        <table class="table table-bordered table-striped table-responsive w-100">
                                        @foreach($data as $item)
                                            <tr>
                                                <td style="width:200px;text-align: center;vertical-align: middle">File telah di-upload</td>
                                                <td>
                                                    <a target="_blank" href="{{ $item->lokasi }}" class="btn btn-primary btn-sm" style="width:70px">
                                                        Tampil
                                                    </a>
                                                    <a href="{{ route('documents.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" style="width:70px">
                                                        Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </table>
                                    </tbody>
                                    @if(count($data) == 0)
                                    <tbody>
                                        <table class="table table-bordered table-striped table-responsive w-100">
                                            <tr>
                                                <td>
                                                    Upload sebuah file (.pdf), yang di dalamnya
                                                    memuat <strong>CV, ijazah, transkrip nilai, KTP, pas foto,
                                                    portofolio, dan sertifikat pendukung</strong>.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="file" name="file" accept="application/pdf">
                                                        <p style="font-size: 8pt">(Ukuran Maksimal: 8 MB, Format: PDF)</p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button type="submit" class="btn btn-primary btn-block">Unggah</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </tbody>
                                    @endif
                                </form>
                                <div class="card-body"> 
                                    <a href="{{ route('questions.index') }}" class="btn btn-secondary btn-sm" style="float:left;width:100px">
                                        Kembali
                                    </a>
                                </div>
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