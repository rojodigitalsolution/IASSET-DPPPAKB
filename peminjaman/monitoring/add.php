<?php
$query = mysqli_query($con, "SELECT * FROM pegawai");
$pegawai = mysqli_fetch_all($query, MYSQLI_ASSOC);
if (isset($_POST['submit'])) {
  $nama_pegawai = $_POST['pegawai'];
  $jenis_kegiatan = $_POST['jenis_kegiatan'];
  $anggaran = $_POST['anggaran'];
  $biaya = $_POST['biaya'];
  $rincian = $_POST['rincian'];
  $tanggal = $_POST['tanggal_keluar'];

  // Proses Pengunggahan Foto
  if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {

    // Direktori tempat menyimpan foto
    $uploadDir = '../manajemen_kinerja/biaya_kegiatan/bukti/';
    // Nama file foto
    $uploadFile = $uploadDir . basename($_FILES['foto']['name']);

    // Pindahkan foto yang diunggah ke direktori tujuan
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile)) {
      // Simpan URL foto ke dalam variabel
      $fotoURL = 'bukti/' . basename($_FILES['foto']['name']);
      $insertFoto = mysqli_query($con, "INSERT INTO biaya_kegiatan(nama_pegawai,jenis_kegiatan,biaya,rincian,tanggal_keluar,foto) VALUES('$nama_pegawai','$jenis_kegiatan','$biaya','$rincian','$tanggal','$fotoURL')");
      if (!$insertFoto) {
        echo "Error: " . mysqli_error($con);
      } else {
        // If the query is successful
        echo "<script>window.location.href = '?page=biaya_kegiatan-show';</script>";
      }
    } else {
      // Gagal memindahkan file foto
      echo "Gagal memindahkan file foto";
    }
  } else {
    // Error saat mengunggah file
    echo "Error saat mengunggah file";
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
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-danger">Biaya Kegiatan</h6>
      </div>
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
            <div class="col-sm-10">
              <select name="pegawai" id="" class="form-control">
                <?php foreach ($pegawai as $p) : ?>
                  <option value="<?= $p["nama"] ?>"><?= $p["nip"] ?> - <?= $p["nama"] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="jenis_kegiatan" class="col-sm-2 col-form-label">Jenis Kegiatan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" required>
            </div>
          </div>

          <!-- <div class="row mb-3">
            <label for="anggaran" class="col-sm-2 col-form-label">Anggaran</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="anggaran" name="anggaran" required>
            </div>
          </div> -->
          <div class="row mb-3">
            <label for="anggaran" class="col-sm-2 col-form-label">Tanggal Keluar Anggaran</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="anggaran" name="tanggal_keluar" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="biaya" name="biaya" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="rincian" class="col-sm-2 col-form-label">Rincian</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="rincian" name="rincian" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="foto" name="foto" required>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col offset-sm-2">
              <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-save"></i>
                Simpan</button>
              <a href="?page=biaya_kegiatan-show" class="btn btn-danger"><i class="fas fa-chevron-left"></i>
                Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>