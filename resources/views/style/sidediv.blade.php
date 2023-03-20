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
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="{{ route('overtimes.man') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              SPL Disetujui Manajer
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

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Dokumen</li>
        <li class="nav-item has-treeview">
          <a href="{{ route('docs.user') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Form HR
            </p>
          </a>
        </li>
      </ul>
      
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">PENGATURAN</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user-cog"></i>
          <p>
            Akunku
            <i class="right fas fa-angle-left"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item" style="margin-left: 20px">
              <a href="{{ '/edit-account' }}" class="nav-link">
                <i class="fas fa-info nav-icon"></i>
                <p>Ubah Data</p>
              </a>
            </li>
            <li class="nav-item" style="margin-left: 20px">
              <a href="{{ '/change-password' }}" class="nav-link">
                <i class="fas fa-key nav-icon"></i>
                <p>Ubah Password</p>
              </a>
            </li>
          </ul>
        </li>
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