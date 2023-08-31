<div style="z-index:-1" class="min-height-300 bg-primary position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="<?= base_url('assets/storage/logo.png') ?>" target="_blank">
      <img src="<?= base_url('assets/storage/logo.png') ?>" width="200px" class="navbar-brand-img h-100" alt="main_logo">

    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse h-auto  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item bg-gradient-info text-white">
        <a class="nav-link" href="#">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-circle-08 text-white text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text fw-bold ms-1 text-white"> Role Akun:
            <?= $this->session->userdata('user_type') === 'Admin' ? 'HRD' : 'Karyawan' ?>
          </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($title === 'Halaman Absensi') ? 'active' : '' ?>" href="<?= site_url('dashboard') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($title === 'Data Kehadiran Anda' || $title === 'Data Detail Kehadiranku') ? 'active' : '' ?> " href="<?= site_url('datakehadiransaya') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Data Kehadiran</span>
        </a>
      </li>
      <?php if ($this->session->userdata('user_type') == 'Admin') { ?>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Admin pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($title === 'Halaman Home' || $title === 'Halaman Detail User' || $title === 'Halaman Edit User') ? 'active' : '' ?> " href="<?= site_url('datapegawai') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Pegawai</span>
          </a>
        </li>
        <li class="nav-item">

          <a class="nav-link <?= ($title === 'Data Kehadiran Pegawai' || $title === 'Data Detail Kehadiran Anda' || $title === 'Halaman Filter Data Absensi' || $title === 'Halaman Export PDF') ? 'active' : '' ?> " href="<?= site_url('datakehadiranpegawai') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Presensi Pegawai</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($title === 'Halaman Setting Jam' || $title === 'Halaman Edit Jam') ? 'active' : '' ?> " href="<?= site_url('jam') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Setting Jam</span>
          </a>
        </li>
    </ul>
  </div>
<?php } ?>
<div class="sidenav-footer mx-3 ">
  <div class="card card-plain shadow-none" id="sidenavCard">
    <div class="card-body text-center p-3 w-100 pt-0">
      <div class="docs-info">
      </div>
    </div>
  </div>
  <a href="<?= site_url('auth/logout') ?>" class="btn btn-danger btn-sm w-100 mb-3">Logout</a>
  <a class="btn btn-primary btn-sm mb-0 w-100" href="<?= site_url('auth/myProfile') ?>" type="button">My Profile</a>
</div>
</aside>