<!-- Sidebar Menu -->
<div class="sidebar">
    <nav class="mt-2">    

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">DATA KARYAWAN</li>
        <li class="nav-item has-treeview">
          <a href="{{ route('employees.index') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Data Staff
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="{{ route('employees.index-tlh') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Data TLH
            </p>
          </a>
        <li class="nav-item has-treeview">
          <a href="{{ route('employees.resign') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Data Resign Staff
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="{{ route('employees.resigntlh') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Data Resign TLH
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview" hidden>
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-list"></i>
          <p>
            Detail Karyawan
            <i class="right fas fa-angle-left"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('employees.basic') }}" class="nav-link">
                <i class="fas fa-user nav-icon"></i>
                <p>Data Karyawan </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('employees.job') }}" class="nav-link">
                <i class="fas fa-building nav-icon"></i>
                <p>Data Pekerjaan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('employees.finance') }}" class="nav-link">
                <i class="fas fa-calculator nav-icon"></i>
                <p>Data Keuangan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('employees.study') }}" class="nav-link">
                <i class="fas fa-school nav-icon"></i>
                <p>Data Pendidikan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('employees.reward') }}" class="nav-link">
                <i class="fas fa-thumbs-up nav-icon"></i>
                <p>Data Penghargaan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('employees.punishment') }}" class="nav-link">
                <i class="fas fa-thumbs-down nav-icon"></i>
                <p>Data Pelanggaran</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">INPUT DATA</li>
        <li class="nav-item has-treeview">
          <a href="{{ route('employees.create') }}" class="nav-link">
            <i class="nav-icon fas fa-user-plus"></i>
            <p>
              Tambah Data Karyawan
            </p>
          </a>
        </li>

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">PELANGGARAN</li>

        <li class="nav-item has-treeview">
          <a href="{{ route('punishments.create') }}" class="nav-link">
            <i class="nav-icon fas fa-plus"></i>
            <p>
              Tambah Pelanggaran
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="{{ route('punishments.index') }}" class="nav-link">
            <i class="nav-icon fas fa-exclamation"></i>
            <p>
              Daftar Pelanggaran
            </p>
          </a>
        </li>
      </ul>

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">KONTRAK</li>
        @if(Auth::user()->admin == "3")
        <li class="nav-item has-treeview">
          <a href="{{ route('contracts.all') }}" class="nav-link">
            <i class="nav-icon fas fa-handshake"></i>
            <p>
              Daftar Perpanjang Kontrak
            </p>
          </a>
        </li>
        @endif
        <li class="nav-item has-treeview">
          <a href="{{ route('contracts.tlh') }}" class="nav-link">
            <i class="nav-icon fas fa-handshake"></i>
            <p>
              Daftar Kontrak TLH
            </p>
          </a>
        </li>
        @if(Auth::user()->admin == "3")
        <li class="nav-item has-treeview">
          <a href="{{ route('salaries.index') }}" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Daftar Kenaikan Gaji
            </p>
          </a>
        </li>
        @endif
      </ul>
      
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
