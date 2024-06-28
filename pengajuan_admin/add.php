<?php
include '../../connection.php';

// Proses tambah pengajuan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_pengajuan'])) {
    $tanggal_pengajuan = $_POST['tanggal_pengajuan'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $status = 'pending';

    $query = "INSERT INTO pengajuan_aset (tanggal_pengajuan, nama_barang, jumlah, status) VALUES ('$tanggal_pengajuan', '$nama_barang', '$jumlah', '$status')";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Pengajuan aset berhasil ditambahkan.'); window.location.href = '?page=pengajuan_admin-show';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!-- Title -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<!-- Content -->
<div class="row">
  <div class="col">
    <!-- Card -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
        <h6 class="m-0 font-weight-bold text-white">Tambah Pengajuan Aset</h6>
      </div>
      <div class="card-body">
        <!-- Form Tambah Pengajuan Aset -->
        <form method="POST" action="">
          <div class="form-group">
            <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
            <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" required>
          </div>
          <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
          </div>
          <button type="submit" class="btn btn-primary" name="submit_pengajuan" href="?page=pengajuan_admin-show">Tambah Pengajuan</button>
          <a href="?page=pengajuan_admin-show" class="btn btn-danger"><i class="fas fa-chevron-left"></i>
                Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
