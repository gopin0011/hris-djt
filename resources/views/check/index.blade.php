@extends('style.reguser')

@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Cek Kelengkapan Pelamar</strong></h3>
                        </div> 
                        <div class="card-body"> 
                            <div class="card">
                                <table id="example4" class="table">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Dokumen</th>
                                        <th>Profil</th>
                                        <th>Data Keluarga</th>
                                        <th>Pendidikan</th>
                                      
                      
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>@foreach ($document as $x)@if($x->user_id == $item->id) ✔ @else @endif @endforeach</td>
                                            <td>@foreach ($profile as $x)@if($x->user_id == $item->id) ✔ @else @endif @endforeach</td>
                                            <td>@php $nilai = 0 @endphp @foreach ($family as $x)@if($x->user_id == $item->id && $nilai == 0) ✔ @php $nilai = $nilai + 1 @endphp @else @endif @endforeach</td>
                                            <td>@php $nilai = 0 @endphp @foreach ($study as $x)@if($x->user_id == $item->id && $nilai == 0) ✔ @php $nilai = $nilai + 1 @endphp @else @endif @endforeach</td>
                                            
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
