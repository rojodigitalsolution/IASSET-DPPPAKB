<?php
include '../../connection.php';

$query = mysqli_query($con, "SELECT * FROM barang");
$barang = mysqli_fetch_all($query, MYSQLI_ASSOC);

$query = mysqli_query($con, "SELECT * FROM lokasi");
$ruang = mysqli_fetch_all($query, MYSQLI_ASSOC);

$query = mysqli_query($con, "SELECT * FROM kategori");
$nama_kategori = mysqli_fetch_all($query, MYSQLI_ASSOC);

// Generate kode aset
$query = mysqli_query($con, "SELECT COUNT(*) AS total FROM aset");
$result = mysqli_fetch_assoc($query);
$totalAset = $result['total'] + 1;
$kodeAset = 'KIA-' . str_pad($totalAset, 3, '0', STR_PAD_LEFT);

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
      
      // Set a default or placeholder value for the barcode
      $gambarBarcodeURL = 'barcode/default_barcode.png';
      
      $insertAset = mysqli_query($con, "INSERT INTO aset(kode_aset, nama_barang, merk, jenis_barang, lokasi, kategori, gambar, barcode, jumlah) VALUES('$kodeAset', '$nama_barang', '$merk', '$jenis_barang', '$lokasi', '$kategori', '$gambarURL', '$gambarBarcodeURL', '$jumlah')");
      
      if (!$insertAset) {
        echo "Error: " . mysqli_error($con);
      } else {
        echo "<script>alert('Data aset berhasil ditambahkan.'); window.location.href = '?page=monitoring_aset-show';</script>";
      }
    } else {
      echo "Gagal memindahkan file gambar";
    }
  } else {
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
        <h6 class="m-0 font-weight-bold text-danger">Tambah Data Aset</h6>
      </div>
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <label for="kode_aset" class="col-sm-2 col-form-label">Kode Aset</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="kode_aset" name="kode_aset" value="<?= $kodeAset ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="merk" class="col-sm-2 col-form-label">Merk</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="merk" name="merk" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="jenis_barang" class="col-sm-2 col-form-label">Jenis Barang</label>
            <div class="col-sm-10">
              <select name="barang" id="" class="form-control">
                <?php foreach ($barang as $b) : ?>
                  <option value="<?= $b["nama_barang"] ?>"><?= $b["nama_barang"]?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="nama_lokasi" class="col-sm-2 col-form-label">Lokasi</label>
            <div class="col-sm-10">
              <select name="ruang" id="" class="form-control">
                <?php foreach ($ruang as $l) : ?>
                  <option value="<?= $l["ruang"] ?>"><?= $l["ruang"]?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="nama_kategori" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
              <select name="nama_kategori" id="" class="form-control">
                <?php foreach ($nama_kategori as $l) : ?>
                  <option value="<?= $l["nama_kategori"] ?>"><?= $l["nama_kategori"]?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="jumlah" name="jumlah" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="gambar" name="gambar" required>
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
