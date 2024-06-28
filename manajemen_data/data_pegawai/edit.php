<?php
$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM pegawai WHERE id=$id");

while ($data = mysqli_fetch_array($result)) {
  $nip = $data['nip'];
  $nama = $data['nama'];
  $jabatan = $data['jabatan'];
  $golongan = $data['golongan'];
  $detail_jabatan = $data['detail_jabatan'];
  $bidang = $data['bidang'];
}

if (isset($_POST['submit'])) {
  $nip = $_POST['nip'];
  $nama = $_POST['nama'];
  $jabatan = $_POST['jabatan'];
  $golongan = $_POST['golongan'];
  $detail_jabatan = $_POST['detail_jabatan'];
  $bidang = $_POST['bidang'];

  $update = mysqli_query($con, "UPDATE pegawai SET nip='$nip',nama='$nama',jabatan='$jabatan',golongan='$golongan',detail_jabatan='$detail_jabatan',bidang='$bidang' WHERE id=$id");

  echo "<script>window.location.href = '?page=pegawai-show';</script>";
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
              <input name="nip" type="text" class="form-control" id="nip" value="<?php echo $nip; ?>" required placeholder="">
            </div>
          </div>

          <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="golongan" class="col-sm-2 col-form-label">Golongan</label>
            <div class="col-sm-10">
              <select name="golongan" id="golongan" class="form-control" required>
                <option value="Golongan I" <?php if ($golongan == 'Golongan I') echo 'selected'; ?>>Golongan I</option>
                <option value="Golongan II" <?php if ($golongan == 'Golongan II') echo 'selected'; ?>>Golongan II</option>
                <option value="Golongan III" <?php if ($golongan == 'Golongan III') echo 'selected'; ?>>Golongan III</option>
                <option value="Golongan IV" <?php if ($golongan == 'Golongan IV') echo 'selected'; ?>>Golongan IV</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
            <div class="col-sm-10">
              <select name="jabatan" id="jabatan" class="form-control" required>
                <option value="Admin" <?php if ($jabatan == 'Admin') echo 'selected'; ?>>Admin</option>
                <option value="Staf" <?php if ($jabatan == 'Staf') echo 'selected'; ?>>Staf</option>
                <option value="Kasi" <?php if ($jabatan == 'Kasi') echo 'selected'; ?>>Kasi</option>
                <option value="Kasubag" <?php if ($jabatan == 'Kasubag') echo 'selected'; ?>>Kasubag</option>
                <option value="Kabid" <?php if ($jabatan == 'Kabid') echo 'selected'; ?>>Kabid</option>
                <option value="Sekretaris" <?php if ($jabatan == 'Sekretaris') echo 'selected'; ?>>Sekretaris</option>
                <option value="Kadis" <?php if ($jabatan == 'Kadis') echo 'selected'; ?>>Kadis</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="detail_jabatan" class="col-sm-2 col-form-label">Detail Jabatan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="detail_jabatan" name="detail_jabatan" value="<?php echo $detail_jabatan; ?>">
            </div>
          </div>

          <div class="row mb-3">
            <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
            <div class="col-sm-10">
              <select name="bidang" id="bidang" class="form-control" required>
                <option value="Perencanaan" <?php if ($bidang == 'Perencanaan') echo 'selected'; ?>>Perencanaan</option>
                <option value="Keuangan" <?php if ($bidang == 'Keuangan') echo 'selected'; ?>>Keuangan</option>
                <option value="PHA" <?php if ($bidang == 'PHA') echo 'selected'; ?>>PHA</option>
                <option value="PPA" <?php if ($bidang == 'PPA') echo 'selected'; ?>>PPA</option>
                <option value="UNPEG" <?php if ($bidang == 'UNPEG') echo 'selected'; ?>>UNPEG</option>
                <option value="KB" <?php if ($bidang == 'KB') echo 'selected'; ?>>KB</option>
                <option value="Lupa" <?php if ($bidang == 'Lupa') echo 'selected'; ?>>Lupa</option>
              </select>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="offset-sm-2">
              <button type="submit" class="btn btn-sm btn-primary" name="submit"><i class="fas fa-save"></i> Simpan</button>
              <a href="?page=pegawai-show" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i> Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
