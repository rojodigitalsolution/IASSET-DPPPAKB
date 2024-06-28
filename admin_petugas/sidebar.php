<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img src="../img/logo_dpppakb.png" alt="Logo" class="img-fluid">
    </div>
    <div class="sidebar-brand-text mx-3 text-left small">
      <strong>DPPPAKB</strong>
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="?page=dashboard">
      <i class="fas fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Data Master -->
  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataMaster" aria-expanded="true" aria-controls="dataMaster">
      <i class="fas fa-database"></i>
      <span>Data Master</span>
    </a>
    <div id="dataMaster" class="collapse" aria-labelledby="headingDataMaster" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Data Management:</h6>
        <a class="collapse-item" href="?page=kategori-show">Data Kategori</a>
        <a class="collapse-item" href="?page=barang-show">Data Barang</a>
        <a class="collapse-item" href="?page=lokasi-show">Data Lokasi</a>
        <a class="collapse-item" href="?page=pegawai-show">Data Pegawai</a>
        <a class="collapse-item" href="?page=user-show">Data User</a>
      </div>
    </div>
  </li> -->

  <!-- Peminjaman -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#peminjaman" aria-expanded="true" aria-controls="peminjaman">
      <i class="fas fa-book"></i>
      <span>Peminjaman</span>
    </a>
    <div id="peminjaman" class="collapse" aria-labelledby="headingPeminjaman" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Peminjaman Management:</h6>
        <a class="collapse-item" href="?page=peminjaman-show">Peminjaman</a>
        <a class="collapse-item" href="?page=pengembalian-show">Pengembalian</a>
        <a class="collapse-item" href="?page=monitoring-show">Monitoring</a>
      </div>
    </div>
  </li>

  <!-- Monitoring Aset -->
  <li class="nav-item active">
    <a class="nav-link" href="?page=monitoring_aset-show">
      <i class="fas fa-cogs"></i>
      <span>Monitoring Aset</span>
    </a>
  </li>

  <!-- Pengajuan -->
  <li class="nav-item active">
    <a class="nav-link" href="?page=pengajuan-show">
      <i class="fas fa-file-signature"></i>
      <span>Pengajuan</span>
    </a>
  </li>

  <!-- Perbaikan Aset -->
  <li class="nav-item active">
    <a class="nav-link" href="?page=perbaikan-show">
      <i class="fas fa-tools"></i>
      <span>Perbaikan Aset</span>
    </a>
  </li>

  <!-- Laporan -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="laporan">
        <i class="fas fa-print"></i>
        <span>Laporan</span>
    </a>
    <div id="laporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <!-- Data Manajemen Segment -->
            <a class="collapse-item collapsed" href="#" data-toggle="collapse" data-target="#dataManajemen" aria-expanded="true" aria-controls="dataManajemen">Data Manajemen</a>
            <div id="dataManajemen" class="collapse">
                <a class="collapse-item" target="_blank" href="../manajemen_data/data_pegawai/print.php">Data Pegawai</a>
                <a class="collapse-item" href="../manajemen_data/data_barang/print.php" target="_blank">Data Barang</a>
                <a class="collapse-item" href="../manajemen_data/data_kategori/print.php" target="_blank">Data Kategori</a>
                <a class="collapse-item" href="../manajemen_data/data_lokasi/print.php" target="_blank">Data Lokasi</a>
                <a class="collapse-item" href="../manajemen_data/data_user/print.php" target="_blank">Data User</a>
            </div>

            <!-- Peminjaman Segment -->
            <a class="collapse-item collapsed" href="#" data-toggle="collapse" data-target="#pinjam" aria-expanded="true" aria-controls="pinjam">Peminjaman</a>
            <div id="pinjam" class="collapse">
                <a class="collapse-item" href="../peminjaman/peminjaman/print.php" target="_blank">Peminjaman</a>
                <a class="collapse-item" href="../peminjaman/pengembalian/print.php" target="_blank">Pengembalian</a>
                <a class="collapse-item" href="../peminjaman/monitoring/print.php" target="_blank">Monitoring Peminjaman</a>
            </div>

            <!-- Monitoring Aset Segment -->
            <a class="collapse-item" href="../monitoring_aset/print.php" target="_blank">Monitoring Aset</a>

            <!-- Pengajuan Aset Segment -->
            <a class="collapse-item" href="../pengajuan/print.php" target="_blank">Pengajuan Aset</a>

            <!-- Perbaikan Aset Segment -->
            <a class="collapse-item" href="../perbaikan/print.php" target="_blank">Perbaikan Aset</a>
        </div>
    </div>
</li>



  <!-- Sidebar Toggle Button -->
  <hr class="sidebar-divider d-none d-md-block">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>

<style>
  .sidebar {
    background: linear-gradient(180deg, #4e73df, #224abe);
    color: #fff;
    box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1);
  }
  .sidebar .nav-item .nav-link {
    color: #fff;
  }
  .sidebar .nav-item .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }
  .sidebar .sidebar-brand-icon img {
    width: 40px;
  }
  .sidebar .collapse-inner {
    background: #f8f9fc;
    border-left: 4px solid #4e73df;
  }
  .sidebar .collapse-header {
    font-weight: bold;
    font-size: 0.85rem;
    text-transform: uppercase;
  }
  .sidebar .collapse-item {
    color: #6c757d;
  }
  .sidebar .collapse-item:hover {
    color: #3a3b45;
  }
  .sidebar-divider {
    border-color: rgba(255, 255, 255, 0.1);
  }
  .sidebar-brand, .nav-link, .collapse-header, .collapse-item {
    text-shadow: 0 0 1px rgba(0, 0, 0, 0.1);
  }
</style>
