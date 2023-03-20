@extends('style.reguser')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Editor</strong></h3>
                        </div> 
                        <div class="card-body"> 
                            <div class="card">
                                <table id="example4" class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Akun</th>
                                        <th>Kel.</th>
                                        <th>Pendidikan</th>
                                        <th>Ref.</th>
                                        <th>Kerja</th>
                                        <th hidden>Hapus</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('editor.account', ['id' => $item->id]) }}" target="_blank" class="btn btn-success btn-sm" data-toggle="tooltip">
                                                    Ubah
                                                </a>
                                            </td>
                                            <td style="text-align: center">
                                                <a href="{{ route('editor.family', ['id' => $item->id]) }}" target="_blank" class="btn btn-success btn-sm" data-toggle="tooltip">
                                                    Ubah
                                                </a>
                                            </td>
                                            <td style="text-align: center">
                                                <a href="{{ route('editor.study', ['id' => $item->id]) }}" target="_blank" class="btn btn-success btn-sm" data-toggle="tooltip">
                                                    Ubah
                                                </a>
                                            </td>
                                            <td style="text-align: center">
                                                <a href="{{ route('editor.reference', ['id' => $item->id]) }}" target="_blank" class="btn btn-success btn-sm" data-toggle="tooltip">
                                                    Ubah
                                                </a>
                                            </td>
                                            <td style="text-align: center">
                                                <a href="{{ route('editor.career', ['id' => $item->id]) }}" target="_blank" class="btn btn-success btn-sm" data-toggle="tooltip">
                                                    Ubah
                                                </a>
                                            </td>
                                            <td style="text-align: center" hidden>
                                                <a href="{{ route('editor.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
