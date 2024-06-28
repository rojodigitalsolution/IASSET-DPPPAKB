<?php
$query = mysqli_query($con, "SELECT * FROM barang");
$barang = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
  $nama_barang = $_POST['barang'];
  $tanggal_pinjam = $_POST['tanggal_kembali']; // Tanggal otomatis hari ini
  $tanggal_kembali = $_POST['tanggal_kembali'];
  $status_pinjam = $_POST['status_pinjam'];
  $query = mysqli_query($con, "INSERT INTO peminjaman(nama_barang, tanggal_pinjam, tanggal_kembali, status_pinjam) VALUES('$nama_barang', '$tanggal_pinjam', '$tanggal_kembali', '$status_pinjam')");

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
            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Pegawai</label>
            <div class="col-sm-10">
              <select name="barang" id="" class="form-control">
                <?php foreach ($barang as $p) : ?>
                  <option value="<?= $p["nama_barang"] ?>"><?= $p["nama_barang"] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="status_pinjam" class="col-sm-2 col-form-label">Status Pinjam</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="status_pinjam" name="status_pinjam" value="dipinjam" readonly>
            </div>
          </div>
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