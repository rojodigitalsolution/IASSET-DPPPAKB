<?php

if (isset($_SESSION['level']) != '') {
  include('../logincheck.php');
}
session_start();
include '../template/header.php';
?>

<body id="page-top">
  <div id="wrapper">
    <?php include 'sidebar.php'; ?>

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <strong>Halo, </strong>
                  <?php if (isset($_SESSION['username']) != '') : echo $_SESSION['username'];
                  endif; ?>
                </span>
                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg" />
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>

        <div class="container-fluid">
          <?php
          include '../connection.php';
          error_reporting(0);
          switch ($_GET['page']) {
            case 'dashboard':
              $title = 'Dashboard';
              include 'dashboard.php';
              break;

// Manajemen Data
// Pegawai
            case 'pegawai-show':
              $title = 'Data Pegawai';
              include '../manajemen_data/data_pegawai/show.php';
              break;
            case 'pegawai-add':
              $title = 'Input Data Pegawai';
              include '../manajemen_data/data_pegawai/add.php';
              break;
            case 'pegawai-delete':
              include '../manajemen_data/data_pegawai/delete.php';
              break;
            case 'pegawai-edit':
              $title = 'Edit Data pegawai';
              include '../manajemen_data/data_pegawai/edit.php';
              break;
            case 'pegawai-print':
              include '../manajemen_data/data_pegawai/print.php';
              break;
            case 'pegawai-print2':
              include '../manajemen_data/data_pegawai/print2.php';
              break;
            case 'pegawai-print3':
              include '../manajemen_data/data_pegawai/print3.php';
              break;

// Kegiatan
            case 'kegiatan-show':
              $title = 'Data kegiatan';
              include '../manajemen_data/data_kegiatan/show.php';
              break;
            case 'kegiatan-add':
              $title = 'Input Data kegiatan';
              include '../manajemen_data/data_kegiatan/add.php';
              break;
            case 'kegiatan-delete':
              include '../manajemen_data/data_kegiatan/delete.php';
              break;
            case 'kegiatan-edit':
              $title = 'Edit Data kegiatan';
              include '../manajemen_data/data_kegiatan/edit.php';
              break;
            case 'kegiatan-print':
              include '../manajemen_data/data_kegiatan/print.php';
              break;
            case 'kegiatan-print2':
              include '../manajemen_data/data_kegiatan/print2.php';
              break;
            case 'kegiatan-print3':
              include '../manajemen_data/data_kegiatan/print3.php';
              break;

// Lokasi
            case 'lokasi-show':
              $title = 'Data Lokasi';
              include '../manajemen_data/data_lokasi/show.php';
              break;
            case 'lokasi-add':
              $title = 'Input Data Lokasi';
              include '../manajemen_data/data_lokasi/add.php';
              break;
            case 'lokasi-delete':
              include '../manajemen_data/data_lokasi/delete.php';
              break;
            case 'lokasi-edit':
              $title = 'Edit Data Lokasi';
              include '../manajemen_data/data_lokasi/edit.php';
              break;
            case 'lokasi-print':
              include '../manajemen_data/data_lokasi/print.php';
              break;
            case 'lokasi-print2':
              include '../manajemen_data/data_lokasi/print2.php';
              break;
            case 'lokasi-print3':
              include '../manajemen_data/data_lokasi/print3.php';
              break;

// kategori
            case 'kategori-show':
              $title = 'Data Kategori';
              include '../manajemen_data/data_kategori/show.php';
              break;
            case 'kategori-add':
              $title = 'Input Data Kategori';
              include '../manajemen_data/data_kategori/add.php';
              break;
            case 'kategori-delete':
              include '../manajemen_data/data_kategori/delete.php';
              break;
            case 'kategori-edit':
              $title = 'Edit Data Kategori';
              include '../manajemen_data/data_kategori/edit.php';
              break;
            case 'kategori-print':
              include '../manajemen_data/data_kategori/print.php';
              break;

// barang
            case 'barang-show':
              $title = 'Data Barang';
              include '../manajemen_data/data_barang/show.php';
              break;
            case 'barang-add':
              $title = 'Input Data Barang';
              include '../manajemen_data/data_barang/add.php';
              break;
            case 'barang-delete':
              include '../manajemen_data/data_barang/delete.php';
              break;
            case 'barang-edit':
              $title = 'Edit Data Barang';
              include '../manajemen_data/data_barang/edit.php';
              break;
            case 'barang-print':
              include '../manajemen_data/data_barang/print.php';
              break;
// user
            case 'user-show':
              $title = 'Data User';
              include '../manajemen_data/data_user/show.php';
              break;
            case 'user-add':
              $title = 'Input Data User';
              include '../manajemen_data/data_user/add.php';
              break;
            case 'user-edit':
              $title = 'Edit Data User';
              include '../manajemen_data/data_user/edit.php';
              break;
            case 'user-delete':
              include '../manajemen_data/data_user/delete.php';
              break;

// pengembalian
            case 'pengembalian-show':
              $title = 'Pengembalian';
              include '../peminjaman/pengembalian/show.php';
              break;
            case 'pengembalian-delete':
              include '../peminjaman/pengembalian/delete.php';
              break;
            case 'pengembalian-edit':
              $title = 'Edit Data Pengembalian';
              include '../peminjaman/pengembalian/edit.php';
              break;
            case 'pengembalian-print':
              include '../peminjaman/pengembalian/print.php';
              break;


// monitoring pinjam
          case 'monitoring-show':
            $title = 'Monitoring';
            include '../peminjaman/monitoring/show.php';
            break;
          case 'monitoring-delete':
            include '../peminjaman/monitoring/delete.php';
            break;
          case 'monitoring-edit':
            $title = 'Edit Data monitoring';
            include '../peminjaman/pengembalian/edit.php';
            break;
          case 'monitoring-print':
            include '../peminjaman/monitoring/print.php';
            break;

// peminjaman
            case 'peminjaman-show':
              $title = 'Peminjaman';
              include '../peminjaman/peminjaman/show.php';
              break;
            case 'peminjaman-add':
              $title = 'Input Data Peminjam';
              include '../peminjaman/peminjaman/add_.php';
              break;
            case 'peminjaman-delete':
              include '../peminjaman/peminjaman/delete.php';
              break;
            case 'peminjaman-edit':
              $title = 'Edit Data Peminjam';
              include '../peminjaman/peminjaman/edit.php';
              break;
            case 'peminjaman-print':
              include '../peminjaman/peminjaman/print.php';
              break;

// aset
          case 'monitoring_aset-show':
            $title = 'Aset';
            include '../monitoring_aset/show.php';
            break;
          case 'monitoring_aset-add':
            $title = 'Input Data Aset';
            include '../monitoring_aset/add.php';
            break;
          case 'monitoring_aset-delete':
            include '../monitoring_aset/delete.php';
            break;
          case 'monitoring_aset-edit':
            $title = 'Edit Data Aset';
            include '../monitoring_aset/edit.php';
            break;
          case 'monitoring_aset-print':
              include '../monitoring_aset/print.php';
              break;

// pengajuan
          case 'pengajuan-show':
            $title = 'Pengajuan Aset';
            include '../pengajuan_admin/show.php';
            break;
          case 'pengajuan-add':
            $title = 'Tambah Data Pengajuan';
            include '../pengajuan_admin/add.php';
            break;
          case 'pengajuan-delete':
            include '../pengajuan_admin/delete.php';
            break;
          case 'pengajuan-edit':
            $title = 'Edit Data Pengajuan';
            include '../pengajuan_admin/edit.php';
            break;
          case 'pengajuan-print':
              include '../pengajuan_admin/print.php';
              break;

// perbaikan
          case 'perbaikan-show':
            $title = 'Perbaikan Aset';
            include '../perbaikan/show.php';
            break;
          case 'perbaikan-add':
            $title = 'Perbaikan Aset';
            include '../perbaikan/add.php';
            break;
          case 'perbaikan-delete':
            include '../perbaikan/delete.php';
            break;
          case 'perbaikan-edit':
            $title = 'Edit Data Perbaikan';
            include '../perbaikan/edit.php';
            break;
          case 'perbaikan-print':
              include '../perbaikan/print.php';
              break;


            case 'admin-logout':
              include 'logout.php';
              break;

            default:
              $title = 'Dashboard';
              include 'dashboard.php';
              break;
          }
          ?>
        </div>

        <?php include '../template/footer.php'; ?>

</body>

</html>