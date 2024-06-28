<?php
$query = mysqli_query($con, "SELECT * FROM barang");
$barang = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
  $nama_barang = $_POST['barang'];
  $nama_peminjam = $_POST['nama_peminjam']; 
  $tanggal_pinjam = $_POST['tanggal_pinjam'];  
  // Mengatur tanggal kembali 7 hari setelah tanggal pinjam
  $tanggal_kembali = date('Y-m-d', strtotime($tanggal_pinjam . ' +7 days'));
  $keperluan = $_POST['keperluan'];
  $status_pinjam = "dipinjam"; // Status dipinjam
  $query = mysqli_query($con, "INSERT INTO peminjaman(nama_barang, nama_peminjam, tanggal_pinjam, tanggal_kembali, keperluan, status_pinjam) VALUES('$nama_barang', '$nama_peminjam', '$tanggal_pinjam', '$tanggal_kembali', '$keperluan', '$status_pinjam')");

  if ($query) {
    echo "<script>alert('Data peminjaman berhasil ditambahkan.'); window.location.href = '?page=peminjaman-show';</script>";
  } else {
    echo "<script>alert('Gagal menambahkan data peminjaman.');</script>";
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
        <h6 class="m-0 font-weight-bold text-danger">Peminjaman</h6>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="row mb-3">
            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
              <select name="barang" id="" class="form-control">
                <?php foreach ($barang as $p) : ?>
                  <option value="<?= $p["nama_barang"] ?>"><?= $p["nama_barang"] ?> - <?= $p["keterangan"] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="nama_peminjam" class="col-sm-2 col-form-label">Nama Peminjam</label>
            <div class="col-sm-10">
              <input name="nama_peminjam" type="text" class="form-control" id="nama_peminjam" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="keperluan" class="col-sm-2 col-form-label">Keperluan</label>
            <div class="col-sm-10">
              <input name="keperluan" type="text" class="form-control" id="keperluan" required>
            </div>
          </div>

          <!-- Status pinjam diisi otomatis -->
          <input type="hidden" name="status_pinjam" value="dipinjam">

          <hr>

          <div class="row">
            <div class="col offset-sm-2">
              <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-save"></i>
                Simpan</button>
              <a href="?page=peminjaman-show" class="btn btn-danger"><i class="fas fa-chevron-left"></i>
                Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
