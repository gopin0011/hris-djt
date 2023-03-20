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

                        <div class="card-body"> 
                            <div class="card">        
                                <form action="{{ route('documents.process') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                    
                                    <table class="table table-bordered table-striped table-responsive w-100 d-block d-md-table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;vertical-align: middle">File</th>
                                                <th style="text-align: center;vertical-align: middle;width:200px">Jenis Dokumen</th>
                                                <th style="text-align: center;vertical-align: middle;width:150px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $item)
                                                <tr>
                                                    <td style="width:200px;text-align: center;vertical-align: middle">{{ $item->file }}</td>
                                                    <td style="width:200px;text-align: center;vertical-align: middle">{{ $item->tipe }}</td>
                                                    <td style="width:200px;text-align: center;vertical-align: middle">
                                                        <a href="{{ route('documents.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" style="width:70px">
                                                            Hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="file" name="file" accept="application/pdf">
                                                        <p style="font-size: 8pt">(Ukuran Maksimal: 2048 KB, Format: PDF)</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select name="tipe" id="tipe" class="form-control">
                                                        <option value="KTP">KTP</option>
                                                        <option value="KK">KK</option>
                                                        <option value="NPWP">NPWP</option>
                                                        <option value="BPJS Tenaga Kerja">BPJS Tenaga Kerja</option>
                                                        <option value="Ijazah">Ijazah</option>
                                                        <option value="Transkrip Nilai">Transkrip Nilai</option>
                                                        <option value="Pas Foto">Pas Foto</option>
                                                        <option value="Portofolio">Portofolio</option>
                                                        <option value="Sertifikat">Sertifikat</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary btn-block">Unggah</button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
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