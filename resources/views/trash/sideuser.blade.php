<!-- Sidebar Menu -->
<div class="sidebar">
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{ '/dashboard' }}" class="nav-link">
          <i class="fas fa-home nav-icon"></i>
          <p><strong>DASHBOARD</strong></p>
        </a>
      </li>
    </ul>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-header">DATA PELAMAR</li>
      <li class="nav-item">
        <a href="{{ '/profiles' }}" class="nav-link">
          <i class="fas fa-id-card nav-icon"></i>
          <p>Identitas Diri</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ '/families' }}" class="nav-link">
          <i class="fas fa-user-friends nav-icon"></i>
          <p>Latar Belakang Keluarga</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ '/careers' }}" class="nav-link">
          <i class="fas fa-briefcase nav-icon"></i>
          <p>Pengalaman Kerja</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ '/studies' }}" class="nav-link">
          <i class="fas fa-user-graduate nav-icon"></i>
          <p>Latar Belakang Pendidikan</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ '/trainings' }}" class="nav-link">
          <i class="fas fa-book nav-icon"></i>
          <p>Pendidikan Non-Formal</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ '/languages' }}" class="nav-link">
          <i class="fas fa-language nav-icon"></i>
          <p>Kemampuan Bahasa</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ '/socials' }}" class="nav-link">
          <i class="fas fa-sitemap nav-icon"></i>
          <p>Kegiatan Sosial</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ '/references' }}" class="nav-link">
          <i class="fas fa-user-tie nav-icon"></i>
          <p>Referensi</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ '/questions' }}" class="nav-link">
          <i class="fas fa-smile nav-icon"></i>
          <p>Gambaran Diri</p>
        </a>
      </li>

    </ul>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-header">DOKUMEN</li>
      <li class="nav-item">
        <a href="{{ '/documents' }}" class="nav-link">
          <i class="fas fa-upload nav-icon"></i>
          <p>Upload Dokumen</p>
        </a>
      </li>

    </ul>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-header">INFORMASI</li>
      <li class="nav-item">
        <a href="{{ '/applications' }}" class="nav-link">
          <i class="fas fa-edit nav-icon"></i>
          <p>Daftar Lamaran</p>
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
          <li class="nav-item">
            <a href="{{ '/edit-account' }}" class="nav-link">
              <i class="fas fa-info nav-icon"></i>
              <p>Ubah Data</p>
            </a>
          </li>
          <li class="nav-item">
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