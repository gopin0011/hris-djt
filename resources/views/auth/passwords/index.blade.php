@extends('style.regoption')
@section('content')
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content" style="padding-top:15px">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><strong>Ubah Password</strong></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            
              <form method="POST" action="{{ route('change.password') }}">
                @csrf 
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password sekarang" name="current_password" id="current_password" required oninvalid="this.setCustomValidity('Password sekarang harus diisi')" oninput="setCustomValidity('')">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-unlock-alt"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password baru"  name="new_password" id="new_password" required oninvalid="this.setCustomValidity('Password baru harus diisi')" oninput="setCustomValidity('')">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Ulangi password baru" name="new_confirm_password" id="new_confirm_password" required oninvalid="this.setCustomValidity('Konfirmasi password')" oninput="setCustomValidity('')">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
                <div class="mb-3">
                  <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                </div>
              </div>
            </form>

            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection