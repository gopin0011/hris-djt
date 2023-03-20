@extends('style.regswitch')
@section('content')
<div class="content-wrapper">
    <section class="content" style="padding-top:15px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">           
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>System Logs</strong></h3>
                        </div>

                        <div class="card-body"> 
                            <div class="card">
                                <table id="example4" class="table">
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Action</th>
                                    <th>IP</th>
                                    <th>Status</th>
                                    <th>Note</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                    @forelse($data as $item)
                                    <tr>
                                        <td>{{ $item->user }}</td>
                                        <td>{{ $item->action }}</td>                                 
                                        <td>{{ $item->ip }}</td>                                 
                                        <td>{{ $item->status }}</td>                                 
                                        <td>{{ $item->note }}</td>                                 
                                        <td>{{ $item->created_at }}</td>                                 
                                    </tr>
                                    @empty
                                        
                                    @endforelse
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