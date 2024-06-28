<?php
include '../../connection.php';

// Proses update status pengajuan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $id_pengajuan = $_POST['id_pengajuan'];
    $status = $_POST['status'];

    $query = "UPDATE pengajuan_aset SET status = '$status' WHERE id_pengajuan = '$id_pengajuan'";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Status pengajuan berhasil diupdate.'); window.location.href = '?page=pengajuan-show';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
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
    <!-- Card -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
        <h6 class="m-0 font-weight-bold text-white">Data Pengajuan Aset</h6>
        <div>
          <a href="?page=pengajuan-add" class="btn btn-sm btn-light"><i class="fas fa-plus text-danger"></i> Tambah Data</a>
        </div>
      </div>
      <div class="card-body">
        <!-- Table Pengajuan Aset -->
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="viewUser">
            <thead class="bg-primary text-white">
              <tr>
                <th class="text-center">No</th>
                <th>Tanggal Pengajuan</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Status Pengajuan</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $query = mysqli_query($con, 'SELECT * FROM pengajuan_aset');
              while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td><?= $data['tanggal_pengajuan']; ?></td>
                  <td><?= $data['nama_barang']; ?></td>
                  <td><?= $data['jumlah']; ?></td>
                  <td class="text-center">
                    <?php
                    if ($data['status'] == 'selesai') {
                      echo '<span class="badge badge-success">Selesai</span>';
                    } elseif ($data['status'] == 'pending') {
                      echo '<span class="badge badge-warning">Pending</span>';
                    } elseif ($data['status'] == 'ditolak') {
                      echo '<span class="badge badge-danger">Ditolak</span>';
                    }
                    ?>
                  </td>
                  <td class="text-center">
                    <a class="btn btn-primary btn-sm" href="?page=pengajuan-edit&id_pengajuan=<?= $data['id_pengajuan']; ?>"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="?page=pengajuan-delete&idid_pengajuan =<?= $data['id_pengajuan']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini?')"><i class="fas fa-trash"></i></a>
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
