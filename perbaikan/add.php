<?php
include '../../connection.php';
$query = mysqli_query($con, "SELECT * FROM aset");
$aset = mysqli_fetch_all($query, MYSQLI_ASSOC);

// Proses tambah data kerusakan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah_kerusakan'])) {
    $nama_aset = $_POST['aset'];
    $tanggal_monitoring = $_POST['tanggal_monitoring'];
    $hasil_monitoring = $_POST['hasil_monitoring'];
    $gambar_hasil = '';

    // Proses upload gambar
    if ($_FILES['gambar_hasil']['name']) {
        $target_dir = "../perbaikan/perbaikan";
        $target_file = $target_dir . basename($_FILES["gambar_hasil"]["name"]);
        if (move_uploaded_file($_FILES["gambar_hasil"]["tmp_name"], $target_file)) {
            $gambar_hasil = basename($_FILES["gambar_hasil"]["name"]);
        } else {
            echo "<script>alert('Gagal mengupload gambar.');</script>";
        }
    }

    $query = "INSERT INTO kerusakan_aset (nama_aset, tanggal_monitoring, hasil_monitoring, gambar_hasil) VALUES ('$nama_aset', '$tanggal_monitoring', '$hasil_monitoring', '$gambar_hasil')";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Data kerusakan berhasil ditambahkan.'); window.location.href = '?page=kerusakan-show';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!-- Title -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tambah Data Kerusakan Aset</h1>
</div>

<!-- Content -->
<div class="row">
  <div class="col">
    <!-- Card -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
        <h6 class="m-0 font-weight-bold text-white">Form Tambah Kerusakan Aset</h6>
      </div>
      <div class="card-body">
        <form method="POST" action="" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="nama_aset" class="col-sm-2 col-form-label">Nama Aset</label>
              <select name="aset" id="" class="form-control">
                <?php foreach ($aset as $p) : ?>
                  <option value="<?= $p["kode_aset"] ?>"><?= $p["kode_aset"] ?></option>
                <?php endforeach; ?>
              </select>
          </div>
          <div class="form-group">
            <label for="tanggal_monitoring">Tanggal Monitoring</label>
            <input type="date" class="form-control" id="tanggal_monitoring" name="tanggal_monitoring" required>
          </div>
          <div class="form-group">
            <label for="hasil_monitoring">Hasil Monitoring</label>
            <input type="text" class="form-control" id="hasil_monitoring" name="hasil_monitoring" required>
          </div>
          <div class="form-group">
            <label for="gambar_hasil">Gambar Hasil Monitoring</label>
            <input type="file" class="form-control-file" id="gambar_hasil" name="gambar_hasil">
          </div>
          <input type="hidden" name="tambah_kerusakan" value="true">
          <button type="submit" class="btn btn-primary">Tambah Data</button>
          <a href="?page=perbaikan-show" class="btn btn-danger"><i class="fas fa-chevron-left"></i> Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
