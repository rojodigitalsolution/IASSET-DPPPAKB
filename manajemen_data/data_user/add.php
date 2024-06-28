<?php
if (isset($_POST['submit'])) {
  $u = $_POST['username'];
  $p = md5($_POST['password']);
  $l = $_POST['level'];

  // Cek apakah username sudah ada
  $result = mysqli_query($con, "SELECT * FROM user WHERE username='$u'");
  $cek = mysqli_num_rows($result);
  if ($cek > 0) {
    echo "<script>
            alert('Gunakan username dengan nama yang lain!');
            window.location.href = '?page=user-add';
          </script>";
    exit;
  }

  // Tambah user baru
  $insert = mysqli_query($con, "INSERT INTO user(username,password,level) VALUES('$u','$p','$l')");
  if ($insert) {
    echo "<script>window.location.href = '?page=user-show';</script>";
  }
}
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>
<div class="row">
  <div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-danger">User</h6>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="row mb-3">
            <label for="level" class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-10">
              <select name="level" id="level" class="form-control" required>
                <option value="" selected disabled>- Pilih -</option>
                <option value="administrator">Administrator</option>
                <option value="petugas">Petugas</option>
                <option value="pimpinan">Pimpinan</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input name="username" type="text" class="form-control" id="username" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col offset-sm-2">
              <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-save"></i> Simpan</button>
              <a href="?page=user-show" class="btn btn-danger"><i class="fas fa-chevron-left"></i> Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
