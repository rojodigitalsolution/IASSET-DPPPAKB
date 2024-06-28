<?php
include '../../connection.php';

// Proses update status perbaikan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $id_perbaikan = $_POST['id_perbaikan'];
    $status = $_POST['status'];

    $query = "UPDATE perbaikan_aset SET status = '$status' WHERE id_perbaikan = '$id_perbaikan'";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Status perbaikan berhasil diupdate.'); window.location.href = '?page=perbaikan-show';</script>";
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
        <h6 class="m-0 font-weight-bold text-white">Data Perbaikan Aset</h6>
        <div>
          <a href="?page=perbaikan-add" class="btn btn-sm btn-light"><i class="fas fa-plus text-danger"></i> Tambah Data</a>
        </div>
      </div>
      <div class="card-body">
        <!-- Table Perbaikan Aset -->
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="viewUser">
            <thead class="bg-primary text-white">
              <tr>
                <th class="text-center">No</th>
                <th>Nama Aset</th>
                <th>Tanggal Monitoring Perbaikan</th>
                <th>Hasil Monitoring</th>
                <th>Gambar Hasil Monitoring</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $query = mysqli_query($con, 'SELECT * FROM kerusakan_aset');
              while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td><?= $data['nama_aset']; ?></td>
                  <td><?= $data['tanggal_monitoring']; ?></td>
                  <td><?= $data['hasil_monitoring']; ?></td>
                  <td class="text-center">
                    <?php if (!empty($data['gambar_hasil'])) : ?>
                      <img src="../perbaikan/perbaikan<?= $data['gambar_hasil'] ?>" alt="Gambar Hasil Monitoring" style="max-width: 100px; max-height: 100px;">
                    <?php else : ?>
                      <p>Tidak ada gambar</p>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?= $data['id_perbaikan']; ?>"><i class="fas fa-info-circle"></i></button>
                    <a href="?page=perbaikan-edit&id=<?= $data['id_perbaikan']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="?page=perbaikan-delete&id=<?= $data['id_perbaikan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>

                <!-- Modal Detail -->
                <div class="modal fade" id="detailModal<?= $data['id_perbaikan']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?= $data['id_perbaikan']; ?>" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel<?= $data['id_perbaikan']; ?>">Detail Perbaikan Aset</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="">
                          <div class="form-group">
                            <label for="nama_aset">Nama Aset</label>
                            <input type="text" class="form-control" id="nama_aset" value="<?= $data['nama_aset']; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label for="tanggal_monitoring">Tanggal Monitoring Perbaikan</label>
                            <input type="text" class="form-control" id="tanggal_monitoring" value="<?= $data['tanggal_monitoring']; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label for="hasil_monitoring">Hasil Monitoring</label>
                            <input type="text" class="form-control" id="hasil_monitoring" value="<?= $data['hasil_monitoring']; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label for="gambar_hasil">Gambar Hasil Monitoring</label>
                            <?php if (!empty($data['gambar_hasil'])) : ?>
                              <img src="../perbaikan/perbaikan<?= $data['gambar_hasil'] ?>" alt="Gambar Hasil Monitoring" class="img-fluid">
                            <?php else : ?>
                              <p>Tidak ada gambar</p>
                            <?php endif; ?>
                          </div>
                          <input type="hidden" name="id_perbaikan" value="<?= $data['id_perbaikan']; ?>">
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
