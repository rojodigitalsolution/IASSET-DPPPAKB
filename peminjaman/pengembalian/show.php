<?php
include '../../connection.php';

// Proses update status pengembalian
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $id_peminjaman = $_POST['id_peminjaman'];

    // Ubah status menjadi "Dikembalikan"
    $query = "UPDATE peminjaman SET status_pinjam = 'dikembalikan' WHERE id_peminjaman = '$id_peminjaman'";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Status pengembalian berhasil diupdate.'); window.location.href = '?page=pengembalian-show';</script>";
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
        <h6 class="m-0 font-weight-bold text-white">Pengembalian</h6>
      </div>
      <div class="card-body">
        <!-- Table Pengembalian -->
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="viewUser">
            <thead class="bg-primary text-white">
              <tr>
                <th class="text-center">No</th>
                <th>Nama Barang</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Kembali</th>
                <th>Status Pinjam</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $query = mysqli_query($con, 'SELECT * FROM peminjaman');
              while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td><?= $data['nama_barang']; ?></td>
                  <td><?= $data['nama_peminjam']; ?></td>
                  <td><?= $data['tanggal_kembali']; ?></td>
                  <td>
                    <?php if ($data['status_pinjam'] == 'dipinjam') : ?>
                      <span class="badge badge-warning">Dipinjam</span>
                    <?php elseif ($data['status_pinjam'] == 'dikembalikan') : ?>
                      <span class="badge badge-success">Dikembalikan</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <?php if ($data['status_pinjam'] == 'dipinjam') : ?>
                      <form method="POST" action="">
                        <input type="hidden" name="id_peminjaman" value="<?= $data['id_peminjaman']; ?>">
                        <input type="hidden" name="update_status" value="true">
                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Anda yakin barang sudah dikembalikan?')"><i class="fas fa-undo"></i> Kembalikan</button>
                      </form>
                    <?php endif; ?>
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
