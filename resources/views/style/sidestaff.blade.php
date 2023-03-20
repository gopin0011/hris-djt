<!-- Sidebar Menu -->
<div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">LOKER</li>
        <li class="nav-item">
          <a href="{{ route('vacancies.index') }}" class="nav-link">
            @csrf
            <i class="nav-icon fas fa-list"></i>
            <p>
              Daftar Lowongan Kerja
            </p>
          </a>
        </li>
        <li class="nav-item" hidden>
          <a href="{{ route('invitations.index') }}" class="nav-link">
            @csrf
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Undang Pelamar
            </p>
          </a>
        </li>
      </ul>

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">DATA & DOKUMEN</li>
        <li class="nav-item">
          <a href="{{ route('checks.index') }}" class="nav-link">
            @csrf
            <i class="nav-icon fas fa-search"></i>
            <p>
              Cek Kelengkapan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('applications.all') }}" class="nav-link">
            @csrf
            <i class="nav-icon fas fa-users"></i>
            <p>
              Daftar Aplikasi Pelamar
            </p>
          </a>
        </li>
        <li class="nav-item" hidden>
          <a href="{{ route('documents.all') }}" class="nav-link">
            @csrf
            <i class="nav-icon fas fa-file"></i>
            <p>
              Dokumen Pelamar
            </p>
          </a>
        </li>
      </ul>

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">JADWAL INTERVIEW</li>
        <li class="nav-item" hidden>
          <a href="{{ route('interview.preschedule') }}" class="nav-link">
            <i class="fas fa-map-pin nav-icon"></i>
            <p>Penentuan Jadwal</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('invitations.index') }}" class="nav-link"><!-- 'interview.schedule' -->
            <i class="fas fa-calendar nav-icon"></i>
            <p>Penentuan Jadwal</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('interview.listtoday') }}" class="nav-link">
            <i class="fas fa-bookmark nav-icon"></i>
            <p>Interview Hari Ini</p>
          </a>
        </li>
      </ul>

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">REKRUTMEN & KONTRAK</li>
        <li class="nav-item">
          <a href="{{ route('interview.list') }}" class="nav-link">
            <i class="fas fa-comments nav-icon"></i>
            <p>Interview & Psikotes</p>
          </a>
        </li>
        <li class="nav-item" hidden>
          <a href="{{ route('psychotest.list') }}" class="nav-link">
            <i class="nav-icon fas fa-braille"></i>
            <p>Psikotes</p>
          </a>
        </li>
  
        <li class="nav-item" hidden>
          <a href="{{ route('results.list') }}" class="nav-link">
            <i class="fas fa-check-square nav-icon"></i>
            <p>Penentuan Hasil</p>
          </a>
        </li>
      </ul>

      <li class="nav-item">
        <a href="{{ route('editor.index') }}" class="nav-link">
          <i class="fas fa-edit nav-icon"></i>
          <p>Editor</p>
        </a>
      </li>

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
