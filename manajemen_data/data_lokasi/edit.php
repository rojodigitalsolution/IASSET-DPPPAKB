<?php
$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM lokasi WHERE id_lokasi=$id");

while ($data = mysqli_fetch_array($result)) {
  $nama_lokasi  = $data['nama_lokasi'];
  $ruang  = $data['ruang'];
}

if (isset($_POST['submit'])) {
  $nama_lokasi  = $_POST['nama_lokasi'];
  $ruang  = $_POST['ruang'];

  $update = mysqli_query($con, "UPDATE lokasi SET nama_lokasi='$nama_lokasi', ruang='$ruang' WHERE id_lokasi=$id");

  echo "<script>window.location.href = '?page=lokasi-show';</script>";
}
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>
<div class="row">
  <div class="col">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-danger">Lokasi</h6>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="row mb-3">
            <label for="nama_lokasi" class="col-sm-2 col-form-label">Nama Lokasi</label>
            <div class="col-sm-10">
              <input name="nama_lokasi" type="text" class="form-control" id="nama_lokasi" value="<?php echo $nama_lokasi; ?>" required
                placeholder="">
            </div>
          </div>
          <div class="row mb-3">
            <label for="ruang" class="col-sm-2 col-form-label">Ruang</label>
            <div class="col-sm-10">
              <input name="ruang" type="text" class="form-control" id="ruang" value="<?php echo $ruang; ?>" required
                placeholder="">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="offset-sm-2">

              <button type="submit" class="btn btn-sm btn-primary" name="submit"><i class="fas fa-save"></i>
                Simpan</button>
              <a href="?page=lokasi-show" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i>
                Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>