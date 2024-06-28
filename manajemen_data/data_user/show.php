<?php session_start(); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<div class="row">
  <div class="col-md-4">
    <!-- Card Menu Users -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
        <h6 class="m-0 font-weight-bold text-white">Ini Adalah Menu Users!</h6>
      </div>
      <div class="card-body">
        <p class="text-muted">Menu ini digunakan untuk mengelola User Aplikasi.</p>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <!-- Card User -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
        <h6 class="m-0 font-weight-bold text-white">User</h6>
      </div>
      <div class="card-body">
        <!-- Button Tambah Data -->
        <a href="?page=user-add" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
        <hr>
        <!-- Table User -->
        <div class="table-responsive">
          <table class="table table-bordered table-hover display" id="viewUser">
            <thead>
              <tr class="bg-primary text-white">
                <th>Username</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../connection.php';
              $query = mysqli_query($con, 'SELECT * FROM user');
              while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td><?php echo $data['username']; ?></td>
                  <td><?php echo $data['level']; ?></td>
                  <?php
                  $user = $data['username'];
                  $useraktif = $_SESSION['username'];
                  ?>
                  <td>
                    <!-- Tombol Edit -->
                    <a class="btn btn-primary btn-sm" href="?page=user-edit&id=<?php echo $data['id']; ?>">
                      <i class="fas fa-edit"></i>
                    </a>
                    <!-- Tombol Hapus -->
                    <a class="btn btn-danger btn-sm <?php if ($user == $useraktif) echo 'disabled'; ?>"
                      href="?page=user-delete&id=<?php echo $data['id']; ?>"
                      onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
