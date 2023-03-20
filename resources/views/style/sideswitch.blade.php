<!-- Sidebar Menu -->
<div class="sidebar">
    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-header">PILIH MENU</li>

        <li class="nav-item">
          <a href="{{ route('switch.rekrutmen') }}" class="nav-link">
            <i class="fas fa-spinner nav-icon"></i>
            <p>Rekrutmen</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('switch.emp') }}" class="nav-link">
            <i class="fas fa-users nav-icon"></i>
            <p>Karyawan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('switch.overtime') }}" class="nav-link">
            <i class="fas fa-clock nav-icon"></i>
            <p>Overtime</p>
          </a>
        </li>
      </ul>

     
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">SISTEM</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-university"></i>
          <p>
            Unit Bisnis dan Divisi
            <i class="right fas fa-angle-left"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item" style="margin-left: 20px">
              <a href="{{ route('units.index') }}" class="nav-link">
                <i class="fas fa-th-large nav-icon"></i>
                <p>Unit Bisnis</p>
              </a>
            </li>
            <li class="nav-item" style="margin-left: 20px">
              <a href="{{ route('divisions.index') }}" class="nav-link">
                <i class="fas fa-th nav-icon"></i>
                <p>Divisi</p>
              </a>
            </li>
          </ul>
        </li>
        @if(Auth::user()->admin == "3")
        <li class="nav-item has-treeview">
          <a href="{{ route('logs.index') }}" class="nav-link">
            <i class="nav-icon fas fa-history"></i>
            <p>
              Log Sistem
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="{{ route('offices.update') }}" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>
              Data Office
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="{{ route('docs.index') }}" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Form HR
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="{{ route('users.privilege') }}" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              User Account Control
            </p>
          </a>
        </li>
	@endif
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
              <a href="{{ route('edit.index') }}" class="nav-link">
                <i class="fas fa-info nav-icon"></i>
                <p>Ubah Data</p>
              </a>
            </li>
            <li class="nav-item" style="margin-left: 20px">
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
