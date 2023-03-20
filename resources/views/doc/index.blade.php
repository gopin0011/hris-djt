@extends('style.regswitch')

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
                                                <a target="_blank" href="{{ "/hris/" . $item->lokasi }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Tampil">
                                                    <span class="fas fa-file"></span>
                                                </a>
                                                <a href="{{ route('docs.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
                                                    <span class="fas fa-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    @if(Auth::user()->admin == 2 || Auth::user()->admin == 3)
                                    <tfoot>
                                        <tr>
                                            
                                            <td>
                                                <div class="form-group">
                                                    <input type="file" name="file" accept="application/pdf">
                                                    <p style="font-size: 8pt">(Ukuran Maksimal: 4 MB, Format: PDF)</p>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary btn-block" style="align-items: right;width:120px">Tambah Form</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
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