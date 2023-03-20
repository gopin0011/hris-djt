<!-- Sidebar Menu -->
<div class="sidebar">
    <nav class="mt-2">    
     
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">SURAT PERINTAH LEMBUR</li>
        @if(Auth::user()->admin == 8)
        <li class="nav-item has-treeview">
          <a href="{{ route('overtimes.create') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Buat SPL
            </p>
          </a>
        </li>
        @endif
        
        <li class="nav-item has-treeview">
          <a href="{{ route('overtimes.index') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Daftar SPL
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="{{ route('overtimes.start') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              SPL Belum Disetujui
              @if(Auth::user()->admin == 9)
                <span class="badge badge-info right">@if($a != 0){{ $a }}@endif</span>
              @endif
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="{{ route('overtimes.man') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              SPL Disetujui Manajer
              @if(Auth::user()->admin == 2 || Auth::user()->admin == 3)
                <span class="badge badge-info right">@if($b != 0){{ $b }}@endif</span>
              @endif
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="{{ route('overtimes.hr') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              SPL Disetujui HR
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="{{ route('overtimes.end') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              SPL Selesai
            </p>
          </a>
        </li>
      </ul>

      @if (Auth::user()->admin == 2 || Auth::user()->admin == 3)
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">PENGAJUAN DANA DAN MENU</li>
        <li class="nav-item has-treeview">
          <a href="{{ route('overtimes.ca') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Cetak Pengajuan
            </p>
          </a>
        </li>
      </ul>
      @endif
      
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">PENGATURAN</li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('auth.logout') }}">
            @csrf
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Keluar
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <!-- /.sidebar-menu -->