<!-- Sidebar -->
<ul class="navbar-nav bg-danger sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon">
    <i class="fas fa-envelope-open-text"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SI PENGARSIPAN SURAT <sup></sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
    Staff
  </div>

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link pb-0" href="<?= base_url('home/index') ?>">
      <i class="fas fa-fw fa-home"></i>
      <span>Dashboard</span></a>
  </li>

  <?php if ($user['role_id'] == 1) : ?>
    <!-- Nav Item - Pages Collapse Menu Blog -->
    <li class="nav-item">
      <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-fw fa-mail-bulk"></i>
        <span>Transaksi Surat</span>
      </a>
    <?php endif; ?>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?= base_url('surat-masuk') ?>">Surat Masuk</a>
        <a class="collapse-item" href="<?= base_url('surat-keluar') ?>">Surat Keluar</a> 
      </div>
    </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu Blog -->
    <li class="nav-item">
      <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-chart-bar"></i>
        <span>Laporan</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="<?= base_url('laporan/surat-masuk') ?>">Surat Masuk</a>
          <a class="collapse-item" href="<?= base_url('laporan/surat-keluar') ?>">Surat Keluar</a>
          <a class="collapse-item" href="<?= base_url('laporan/memo-masuk') ?>">Memo Masuk</a>
          <a class="collapse-item" href="<?= base_url('laporan/memo-keluar') ?>">Memo Keluar</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu Blog -->
    <li class="nav-item">
      <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-fw fa-file-archive"></i>
        <span>Galeri File</span>
      </a>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="<?= base_url('galeri/surat-masuk') ?>">Surat Masuk</a>
          <a class="collapse-item" href="<?= base_url('galeri/surat-keluar') ?>">Surat Keluar</a>
          <a class="collapse-item" href="<?= base_url('galeri/memo-masuk') ?>">Memo Masuk</a>
          <a class="collapse-item" href="<?= base_url('galeri/memo-keluar') ?>">Memo Keluar</a>
        </div>
      </div>
    </li>

    <?php if ($user['role_id'] == 1) : ?>
      <li class="nav-item">
        <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-fw fa-mail-bulk"></i>
          <span>Memo</span>
        </a>
      <?php endif; ?>
      <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="<?= base_url('memo-masuk') ?>">Memo Masuk</a>
          <a class="collapse-item" href="<?= base_url('memo-keluar') ?>">Memo Keluar</a>
        </div>
      </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed pb-0" href="<?= base_url('user'); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>User Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed pb-0" href="<?= base_url('user/ubah-password'); ?>">
          <i class="fas fa-fw fa-key"></i>
          <span>Ubah Password</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider1">

      <!-- Nav Item - Pages Collapse Menu Blog -->
      <li class="nav-item">
        <a class="nav-link pb-2 collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan" aria-expanded="true" aria-controls="collapsePengaturan">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Pengaturan</span>
        </a>
        <div id="collapsePengaturan" class="collapse" aria-labelledby="headingPengaturan" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <?php if ($user['role_id'] == 1) : ?>
              <a class="collapse-item" href="<?= base_url('pengaturan/role') ?>">Role</a>
              <a class="collapse-item" href="<?= base_url('pengaturan/pengguna') ?>">Pengguna</a>
            <?php endif; ?>
            <a class="collapse-item" href="<?= base_url('pengaturan/klasifikasi') ?>">Klasifikasi</a>
            <a class="collapse-item" href="<?= base_url('pengaturan/sifat') ?>">Sifat Surat</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->

      <hr>
      <div class="text-center d-none d-md-inline">
        <button aria-label="toggler" class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

</ul>
<!-- End of Sidebar -->