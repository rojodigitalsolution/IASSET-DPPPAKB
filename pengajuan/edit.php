<?php
include '../../connection.php';

// Check if id_pengajuan is set in the URL
if (isset($_GET['id_pengajuan'])) {
    $id_pengajuan = $_GET['id_pengajuan'];
    
    // Fetch existing data
    $query = "SELECT * FROM pengajuan_aset WHERE id_pengajuan = '$id_pengajuan'";
    $result = mysqli_query($con, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Pengajuan aset tidak ditemukan.'); window.location.href = '?page=pengajuan-show';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID pengajuan tidak diberikan.'); window.location.href = '?page=pengajuan-show';</script>";
    exit;
}

// Proses update pengajuan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_pengajuan'])) {
    $tanggal_pengajuan = $_POST['tanggal_pengajuan'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $status = $_POST['status'];

    $query = "UPDATE pengajuan_aset SET tanggal_pengajuan = '$tanggal_pengajuan', nama_barang = '$nama_barang', jumlah = '$jumlah' WHERE id_pengajuan = '$id_pengajuan'";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Pengajuan aset berhasil diupdate.'); window.location.href = '?page=pengajuan-show';</script>";
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
        <h6 class="m-0 font-weight-bold text-white">Edit Pengajuan Aset</h6>
      </div>
      <div class="card-body">
        <!-- Form Edit Pengajuan Aset -->
        <form method="POST" action="">
          <div class="form-group">
            <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
            <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" value="<?= $data['tanggal_pengajuan']; ?>" required>
          </div>
          <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $data['nama_barang']; ?>" required>
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $data['jumlah']; ?>" required>
          </div>
          <button type="submit" class="btn btn-primary" name="update_pengajuan">Update Pengajuan</button>
          <a href="?page=pengajuan-show" class="btn btn-danger"><i class="fas fa-chevron-left"></i> Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
