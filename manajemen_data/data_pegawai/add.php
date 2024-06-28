<?php
if (isset($_POST['submit'])) {
  $nip = $_POST['nip'];
  $nama = $_POST['nama'];
  $jabatan = $_POST['jabatan'];
  $golongan = $_POST['golongan'];
  $detail_jabatan = $_POST['detail_jabatan'];
  $bidang = $_POST['bidang'];
  
  $insert = mysqli_query($con, "INSERT INTO pegawai(nip,nama,jabatan,golongan,detail_jabatan,bidang) VALUES('$nip','$nama','$jabatan','$golongan','$detail_jabatan','$bidang')");

  if ($insert) {
    echo "<script>window.location.href = '?page=pegawai-show';</script>";
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
        <h6 class="m-0 font-weight-bold text-danger">Pegawai</h6>

      </div>
      <div class="card-body">
        <form method="POST">
          <div class="row mb-3">
            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-10">
              <input name="nip" type="text" class="form-control" id="nip" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
            <div class="col-sm-10">
              <select name="jabatan" id="jabatan" class="form-control" name="jabatan" required>
                <option value="-" selected disabled>- Pilih -</option>
                <option value="Admin">Admin</option>
                <option value="Staf">Staf</option>
                <option value="Kasi">Kasi</option>
                <option value="Kasubag">Kasubag</option>
                <option value="Kabid">Kabid</option>
                <option value="Sekretaris">Sekretaris</option>
                <option value="Kadis">Kadis</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="golongan" class="col-sm-2 col-form-label">golongan</label>
            <div class="col-sm-10">
              <select name="golongan" id="golongan" class="form-control" name="golongan" required>
                <option value="-" selected disabled>- Pilih -</option>
                <option value="Golongan I">Golongan I</option>
                <option value="Golongan II">Golongan II</option>
                <option value="Golongan III">Golongan III</option>
                <option value="Golongan IV">Golongan IV</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="detail_jabatan" class="col-sm-2 col-form-label">Detail Jabatan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="detail_jabatan" name="detail_jabatan">
            </div>
          </div>

          <div class="row mb-3">
            <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
            <div class="col-sm-10">
            <select name="bidang" id="bidang" class="form-control" name="bidang" required>
                <option value="-" selected disabled>- Pilih -</option>
                <option value="Perencanaan">Perencanaan</option>
                <option value="Keuangan">Keuangan</option>
                <option value="PHA">PHA</option>
                <option value="PPA">PPA</option>
                <option value="UNPEG">UNPEG</option>
                <option value="KB">KB</option>
                <option value="Lupa">Lupa</option>
              </select>
            </div>
          </div>
          <hr>

          <div class="row">

            <div class="col offset-sm-2">
              <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-save"></i>
                Simpan</button>
              <a href="?page=pegawai-show" class="btn btn-danger"><i class="fas fa-chevron-left"></i>
                Kembali</a>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>