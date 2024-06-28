<?php
include '../../connection.php';

// Ambil ID aset dari parameter URL
$id_aset = $_GET['id'];

// Ambil data aset berdasarkan ID
$query = mysqli_query($con, "SELECT * FROM aset WHERE id_aset = '$id_aset'");
$aset = mysqli_fetch_assoc($query);

// Ambil data barang, lokasi, dan kategori untuk dropdown
$query = mysqli_query($con, "SELECT * FROM barang");
$barang = mysqli_fetch_all($query, MYSQLI_ASSOC);

$query = mysqli_query($con, "SELECT * FROM lokasi");
$ruang = mysqli_fetch_all($query, MYSQLI_ASSOC);

$query = mysqli_query($con, "SELECT * FROM kategori");
$nama_kategori = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
  $nama_barang = $_POST['barang'];
  $merk = $_POST['merk'];
  $jenis_barang = $_POST['barang'];
  $lokasi = $_POST['ruang'];
  $kategori = $_POST['nama_kategori'];
  $jumlah = $_POST['jumlah'];

  // Proses Pengunggahan Gambar
  if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../monitoring_aset/gambar/';
    $uploadFile = $uploadDir . basename($_FILES['gambar']['name']);

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadFile)) {
      $gambarURL = 'gambar/' . basename($_FILES['gambar']['name']);
    } else {
      echo "Gagal memindahkan file gambar";
    }
  } else {
    $gambarURL = $aset['gambar'];
  }

  // Proses Pengunggahan Barcode
  if (isset($_FILES['barcode']) && $_FILES['barcode']['error'] === UPLOAD_ERR_OK) {
    $uploadDirBarcode = '../monitoring_aset/barcode/';
    $uploadFileBarcode = $uploadDirBarcode . basename($_FILES['barcode']['name']);

    if (move_uploaded_file($_FILES['barcode']['tmp_name'], $uploadFileBarcode)) {
      $gambarBarcodeURL = 'barcode/' . basename($_FILES['barcode']['name']);
    } else {
      echo "Gagal memindahkan file gambar barcode";
    }
  } else {
    $gambarBarcodeURL = $aset['barcode'];
  }

  // Update data aset di database
  $updateAset = mysqli_query($con, "UPDATE aset SET 
    nama_barang = '$nama_barang', 
    merk = '$merk', 
    jenis_barang = '$jenis_barang', 
    lokasi = '$lokasi', 
    kategori = '$kategori', 
    gambar = '$gambarURL', 
    barcode = '$gambarBarcodeURL', 
    jumlah = '$jumlah' 
    WHERE id_aset = '$id_aset'");
  
  if (!$updateAset) {
    echo "Error: " . mysqli_error($con);
  } else {
    echo "<script>alert('Data aset berhasil diperbarui.'); window.location.href = '?page=monitoring_aset-show';</script>";
  }
}
?>

<!-- Title -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Edit Data Aset</h1>
</div>

<!-- Content -->
<div class="row">
  <div class="col">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-danger">Form Edit Data Aset</h6>
      </div>
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <label for="kode_aset" class="col-sm-2 col-form-label">Kode Aset</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="kode_aset" name="kode_aset" value="<?= $aset['kode_aset'] ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $aset['nama_barang'] ?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="merk" class="col-sm-2 col-form-label">Merk</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="merk" name="merk" value="<?= $aset['merk'] ?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
              <select name="barang" id="barang" class="form-control">
                <?php foreach ($barang as $b) : ?>
                  <option value="<?= $b["nama_barang"] ?>" <?= $b["nama_barang"] == $aset['nama_barang'] ? 'selected' : '' ?>><?= $b["nama_barang"] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="ruang" class="col-sm-2 col-form-label">Lokasi</label>
            <div class="col-sm-10">
              <select name="ruang" id="ruang" class="form-control">
                <?php foreach ($ruang as $l) : ?>
                  <option value="<?= $l["ruang"] ?>" <?= $l["ruang"] == $aset['lokasi'] ? 'selected' : '' ?>><?= $l["ruang"] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="nama_kategori" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
              <select name="nama_kategori" id="nama_kategori" class="form-control">
                <?php foreach ($nama_kategori as $l) : ?>
                  <option value="<?= $l["nama_kategori"] ?>" <?= $l["nama_kategori"] == $aset['kategori'] ? 'selected' : '' ?>><?= $l["nama_kategori"] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $aset['jumlah'] ?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="gambar" name="gambar">
              <img src="../monitoring_aset/<?= $aset['gambar'] ?>" alt="Gambar Aset" style="max-width: 200px; margin-top: 10px;">
            </div>
          </div>

          <div class="row mb-3">
            <label for="barcode" class="col-sm-2 col-form-label">Gambar Barcode</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="barcode" name="barcode">
              <img src="../monitoring_aset/<?= $aset['barcode'] ?>" alt="Barcode Aset" style="max-width: 200px; margin-top: 10px;">
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col offset-sm-2">
              <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-save"></i> Simpan</button>
              <a href="?page=monitoring_aset-show" class="btn btn-danger"><i class="fas fa-chevron-left"></i> Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
