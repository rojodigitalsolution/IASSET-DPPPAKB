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
          <a href="?page=monitoring_aset-add" class="btn btn-sm btn-light"><i class="fas fa-plus text-danger"></i> Tambah Data</a>
        </div>
      </div>
      <div class="card-body">
        <!-- Table Pengajuan Aset -->
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="viewAset">
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
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?= $data['id_pengajuan']; ?>"><i class="fas fa-info-circle"></i></button>
                  </td>
                </tr>

                <!-- Modal Detail -->
                <div class="modal fade" id="detailModal<?= $data['id_pengajuan']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?= $data['id_pengajuan']; ?>" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel<?= $data['id_pengajuan']; ?>">Detail Pengajuan Aset</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="">
                          <div class="form-group">
                            <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                            <input type="text" class="form-control" id="tanggal_pengajuan" value="<?= $data['tanggal_pengajuan']; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" value="<?= $data['nama_barang']; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" value="<?= $data['jumlah']; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label for="status">Status Pengajuan</label>
                            <select class="form-control" id="status" name="status">
                              <option value="selesai" <?= $data['status'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                              <option value="pending" <?= $data['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                              <option value="ditolak" <?= $data['status'] == 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
                            </select>
                          </div>
                          <input type="hidden" name="id_pengajuan" value="<?= $data['id_pengajuan']; ?>">
                          <input type="hidden" name="update_status" value="true">
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
