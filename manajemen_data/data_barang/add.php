<?php
if (isset($_POST['submit'])) {
  $nama_barang = $_POST['nama_barang'];
  $keterangan = $_POST['keterangan'];

  $insert = mysqli_query($con, "INSERT INTO barang(nama_barang,keterangan) VALUES('$nama_barang','$keterangan')");

  if ($insert) {
    echo "<script>window.location.href = '?page=barang-show';</script>";
  }
}
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>
<div class="row">
  <div class="col">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-danger">Barang</h6>

      </div>
      <div class="card-body">
        <form method="POST">

          <div class="row mb-3">
            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
              <input name="nama_barang" type="text" class="form-control" id="nama_barang" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
              <input name="keterangan" type="text" class="form-control" id="keterangan" required>
            </div>
          </div>
          <hr>

          <div class="row">

            <div class="col offset-sm-2">
              <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-save"></i>
                Simpan</button>
              <a href="?page=barang-show" class="btn btn-danger"><i class="fas fa-chevron-left"></i>
                Kembali</a>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>