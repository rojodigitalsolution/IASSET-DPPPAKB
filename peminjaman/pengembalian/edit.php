<?php
$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM surat_tugas WHERE id=$id");

// Fetch data from the database
while ($data = mysqli_fetch_array($result)) {
  $data_kegiatan = $data['data_kegiatan'];
  $tempat = $data['tempat'];
  $jumlah_peserta = $data['jumlah_peserta'];
  $nama_pegawai = $data['nama_pegawai'];
  $datetime_mulai = $data['waktu_mulai'];
  $datetime_selesai = $data['waktu_selesai'];
}

if (isset($_POST['submit'])) {
  // Retrieve data from the form
  $data_kegiatan = $_POST['data_kegiatan'];
  $tempat = $_POST['tempat'];
  $jumlah_peserta = $_POST['jumlah_peserta'];
  $nama_pegawai = $_POST['nama_pegawai'];
  $datetime_mulai = $_POST['waktu_mulai'];
  $datetime_selesai = $_POST['waktu_selesai'];

  // Update data in the database
  $update = mysqli_query($con, "UPDATE surat_tugas SET data_kegiatan='$data_kegiatan',tempat='$tempat',jumlah_peserta='$jumlah_peserta',nama_pegawai='$nama_pegawai',waktu_mulai='$datetime_mulai',waktu_selesai='$datetime_selesai' WHERE id=$id");

  // Redirect to the surat_tugas-show page after updating
  echo "<script>window.location.href = '?page=surat_tugas-show';</script>";
}
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>
<div class="row">
  <div class="col">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-danger">Surat Tugas</h6>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="row mb-3">
            <label for="data_kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
            <div class="col-sm-10">
              <input name="data_kegiatan" type="text" class="form-control" id="data_kegiatan" value="<?= $data_kegiatan ?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="tempat" name="tempat" value="<?= $tempat ?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="jumlah_peserta" class="col-sm-2 col-form-label">Jumlah Peserta</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="<?= $jumlah_peserta ?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= $nama_pegawai ?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="waktu_mulai" class="col-sm-2 col-form-label">Waktu Mulai</label>
            <div class="col-sm-10">
              <input type="datetime-local" class="form-control" id="waktu_mulai" name="waktu_mulai" value="<?= $datetime_mulai ?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="waktu_selesai" class="col-sm-2 col-form-label">Waktu Selesai</label>
            <div class="col-sm-10">
              <input type="datetime-local" class="form-control" id="waktu_selesai" name="waktu_selesai" value="<?= $datetime_selesai ?>" required>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="offset-sm-2">
              <button type="submit" class="btn btn-sm btn-primary" name="submit"><i class="fas fa-save"></i> Simpan</button>
              <a href="?page=surat_tugas-show" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i> Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
