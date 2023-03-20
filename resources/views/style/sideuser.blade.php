<!-- Sidebar Menu -->
<div class="sidebar">
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-header">STATUS KELENGKAPAN</li>
          
      <li class="nav-item">
        <a class="nav-link">
          <i class="nav-icon fas fa-briefcase"></i>
          <p>
            Pilih Loker
            @if($a ?? '' != 0)
              <span class="badge badge-success right">✓</span>
            @else
              <span class="badge badge-danger right">✕</span>
            @endif
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>
            Profil
            @if($b != 0 && $b1 != 0 && $b2 != 0 && $b3 != 0)
              <span class="badge badge-success right">✓</span>
            @else
              <span class="badge badge-danger right">✕</span>
            @endif
          </p>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>
            Dokumen
            @if($c != 0)
              <span class="badge badge-success right">✓</span>
            @else
              <span class="badge badge-danger right">✕</span>
            @endif
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
          <li style="margin-left: 20px" class="nav-item">
            <a href="{{ route('edit.index') }}" class="nav-link">
              <i class="fas fa-info nav-icon"></i>
              <p>Ubah Data</p>
            </a>
          </li>
          <li style="margin-left: 20px" class="nav-item">
            <a href="{{ route('change.index') }}" class="nav-link">
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